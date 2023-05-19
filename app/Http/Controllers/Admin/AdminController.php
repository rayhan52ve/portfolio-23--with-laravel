<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Protfolio;
use App\Mail\Websitemail;
use App\Mail\ContactUS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;


class AdminController extends Controller
{
    public function dashboard(){
        return view("Admin.dashboard");
    }
    public function support()
    {
        return view("Admin.support.support");

    }   
    public function ForgetPassword()
    {
        return view("auth.forget");
    }
    public function ForgetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            
        ]);
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return redirect()->back()->with('error','Email Address not found');
        }

        $token = hash('sha256',time());

        $user->remember_token = $token;
        $user->update();

        $reset_link = url('admin/reset-password/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = 'Please clik on this link: <br>';
        $message = '<a href="' . $reset_link . '">Click here</a>';

        Mail::to($request->email)->send(new Websitemail($subject, $message));
        return redirect()->route('login')->with('success','Please check your email and follow the step');
    
    }

    public function ForgetResetPassword($remember_token,$email)
    {
       $user = User::where('remember_token', $remember_token)->where('email', $email)->first();
        if (!$user) {
            return redirect()->route('login');
        }

        return view('auth.reset_password',compact('remember_token','email'));
    }

    public function ResetPasswordPost(Request $request)
    {
        $request->validate([
            'password' => 'required',  
            'confrim_password' => 'required|same:password',  
            
        ]);

        $user = User::where('remember_token',$request->remember_token)->where('email',$request->email)->first();
        
        $user->password = Hash::make($request->password);
        $user->remember_token = '';
        $user->update();

        return redirect()->route('login')->with('success','Password is Reset Successefully');
    }

    public function profile()
    {
        $user = User::get()->first();
        // dd($user);
        return view('Admin.profile.profile',compact('user'));
    }

    public function profile_edit()
    {
        $user = User::first();
        return view('Admin.profile.edit_profile',compact('user'));
    }
    public function profile_update(Request $request,string $id)
    {
        if($request->isMethod('PUT')){
            $user  = User::find($id);
            if ($request->hasFile('image')) {
                $image_tmp = $request->file('image');

                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $image_name = $image_tmp->getClientOriginalName();
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = $image_name . '-' . rand(111, 99999) . '.' . $extension;
                    $image_path = 'uploads' . '/' . $fileName;

                    Image::make($image_tmp)->resize(150, 150)->save($image_path);

                }
            }elseif(Auth::user()->image){
                $image_path = Auth::user()->image;
            }


            $user->name = $request->name;
            $user->description = $request->description;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->designation = $request->designation;
            $user->address = $request->address;
            $user->age = $request->age;
            $user->nationality = $request->nationality;
            $user->freelance = $request->freelance;
            $user->languages = $request->languages;
            $user->skype = $request->skype;
            $user->complete_project = $request->complete_project;
            $user->image = $image_path;
            $user->update();
            
        }
        return redirect()->route('profile');
    }

public function contactUS(Request $request)
{
    // dd($request->all());
    if($request->isMethod("post")){
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        Mail::to($email)->send(new ContactUS($name,$email,$subject,$message));
    }
}

public function CvDownlooad()
{
    $protfolio = User::first();

 

    $dompdf = new Dompdf();

    $output = '<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <title>Example 2</title>
        <!-- <link rel="stylesheet" href="style.css" media="all" /> -->
        <style>
          @font-face {
      font-family: SourceSansPro;
      src: url(SourceSansPro-Regular.ttf);
    }
    
    .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }
    
    a {
      color: #0087C3;
      text-decoration: none;
    }
    
    body {
      position: relative;
      width: 21cm;  
      height: 29.7cm; 
      margin: 0 auto; 
      color: #555555;
      background: #FFFFFF; 
      font-family: Arial, sans-serif; 
      font-size: 14px; 
      font-family: SourceSansPro;
    }
    
    header {
      padding: 10px 0;
      margin-bottom: 20px;
      border-bottom: 1px solid #AAAAAA;
    }
    
    #logo {
      float: left;
      margin-top: 8px;
    }
    
    #logo img {
      height: 70px;
    }
    
    #company {
      float: right;
      text-align: right;
    }
    
    
    #details {
      margin-bottom: 50px;
    }
    
    #client {
      padding-left: 6px;
      border-left: 6px solid #0087C3;
      float: left;
    }
    
    #client .to {
      color: #777777;
    }
    
    h2.name {
      font-size: 1.4em;
      font-weight: normal;
      margin: 0;
    }
    
    #invoice {
      float: right;
      text-align: right;
    }
    
    #invoice h1 {
      color: #0087C3;
      font-size: 2.4em;
      line-height: 1em;
      font-weight: normal;
      margin: 0  0 10px 0;
    }
    
    #invoice .date {
      font-size: 1.1em;
      color: #777777;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 20px;
    }
    
    table th,
    table td {
      padding: 20px;
      background: #EEEEEE;
      text-align: center;
      border-bottom: 1px solid #FFFFFF;
    }
    
    table th {
      white-space: nowrap;        
      font-weight: normal;
    }
    
    table td {
      text-align: right;
    }
    
    table td h3{
      color: #57B223;
      font-size: 1.2em;
      font-weight: normal;
      margin: 0 0 0.2em 0;
    }
    
    table .no {
      color: #FFFFFF;
      font-size: 1.6em;
      background: #57B223;
    }
    
    table .desc {
      text-align: left;
    }
    
    table .unit {
      background: #DDDDDD;
    }
    
    table .qty {
    }
    
    table .total {
      background: #57B223;
      color: #FFFFFF;
    }
    
    table td.unit,
    table td.qty,
    table td.total {
      font-size: 1.2em;
    }
    
    table tbody tr:last-child td {
      border: none;
    }
    
    table tfoot td {
      padding: 10px 20px;
      background: #FFFFFF;
      border-bottom: none;
      font-size: 1.2em;
      white-space: nowrap; 
      border-top: 1px solid #AAAAAA; 
    }
    
    table tfoot tr:first-child td {
      border-top: none; 
    }
    
    table tfoot tr:last-child td {
      color: #57B223;
      font-size: 1.4em;
      border-top: 1px solid #57B223; 
    
    }
    
    table tfoot tr td:first-child {
      border: none;
    }
    
    #thanks{
      font-size: 2em;
      margin-bottom: 50px;
    }
    
    #notices{
      padding-left: 6px;
      border-left: 6px solid #0087C3;  
    }
    
    #notices .notice {
      font-size: 1.2em;
    }
    
    footer {
      color: #777777;
      width: 100%;
      height: 30px;
      position: absolute;
      bottom: 0;
      border-top: 1px solid #AAAAAA;
      padding: 8px 0;
      text-align: center;
    }
    
    
        </style>
      </head>
      <body>
        <header class="clearfix">
    
   
        <main>
          <div id="details" class="clearfix">
            <div id="client">
              <div class="to">INVOICE TO:</div>
              <div class="address">'.$protfolio['address'].','.$protfolio['age'].','.$protfolio['phone'].','.$protfolio['age'].','.$protfolio['skype'].'</div>
              <div class="email"><a href="'.$protfolio['email'].'">'.$protfolio['email'].'</a></div>
            </div>

          <table border="0" cellspacing="0" cellpadding="0">
            <thead>
              <tr>
                <th colspan="3" class="desc">DESCRIPTION</th>
                <th class="total">DURATION</th>
                <th class="total">TOTAL</th>
              </tr>
            </thead>
           
          </table>
          <div id="thanks">Thank you!</div>
          <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
          </div>
        </main>
        <footer>
          Invoice was created on a computer and is valid without the signature and seal.
        </footer>
      </body>
    </html>';
    $dompdf->loadHtml($output);

    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream();
    // return response()->download($userDetails);
}

}