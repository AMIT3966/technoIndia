<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ContentAbout;
use App\Models\ContentContact;
use App\Models\ContentEpc;
use App\Models\News;
use App\Models\Lead;
use App\Models\Category;
use App\Models\Job;
use App\Models\Career;
use App\Models\CareerExperience;
use Illuminate\Support\Facades\DB;
use App\Models\Partner;
use App\Models\Certificate;
use App\Models\SeoPage;
use App\Models\Product;
use App\Models\ContentHome;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContentController extends Controller
{
    public function send(Request $request){
        try {
            $mail = new PHPMailer(true);
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.netcorecloud.net';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'technoapi';
            $mail->Password   = 'TIGws@2024';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            //Recipients
            $mail->setFrom('admin@technoindiagroupworldschool.com', 'TIGWS');
            $mail->addAddress('rajibalikhan299@gmail.com', 'Rajib');

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Application Form Received';
            $mail->Body = '<html><body>
                <p>Thank you for applying for the position of <em>&lt;position name&gt;</em> at Techno India Group World School.</p>
                <p>Your application has been received.</p>
                <p>Please note your Application ID: <strong>xxxxxxxxxx</strong>.</p>
                <p>In case of any query related to your application, please feel free to contact us on <strong>&lt;mobile number&gt;</strong>.</p>
            </body></html>';
            $mail->send();
            return response()->json(['message' => 'Email has been sent successfully.']);
        } catch (Exception $e) {
            return response()->json(['error' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo]);
        }
    }

    public function about(Request $request)
    {
        $seo = SeoPage::where('page', 'about')->first();
        $data = ContentAbout::first();
        return view('front.content.about', compact('data', 'seo'));
    }

    public function contact(Request $request)
    {
        $seo = SeoPage::where('page', 'contact')->first();
        $data = ContentContact::first();
        return view('front.content.contact', compact('data', 'seo'));
    }

    // public function contactEnquiry(Request $request)
    // {
    //     $request->validate([
    //         'company_name' => 'nullable|string|min:1|max:255',
    //         'full_name' => 'required|string|min:1|max:255',
    //         'mobile_no' => 'required|integer|digits:10',
    //         'email' => 'required|email|min:1|max:255',
    //         'message' => 'nullable|string|min:1|max:255',
    //     ]);

    //     // If the validation passes, you can proceed with your logic
      
    //     try {
    //         DB::beginTransaction();
    //         // Generate a unique name for the file
    //         $lead = new Lead();
    //         $lead->company_name = $request->company_name ?? '';
    //         $lead->full_name = $request->full_name;
    //         $lead->mobile_no = $request->mobile_no;
    //         $lead->email = $request->email;
    //         $lead->message = $request->message ?? '';
    //         $lead->save();
    //         // Commit the transaction
    //         DB::commit();

    //         // Optionally, you can return a response or redirect to a success page
    //         return redirect()->back()->with('success', 'Thank you for your interest. We will contact you soon.');
    //     } catch (\Exception $e) {
    //     //     // If an exception occurs, rollback the transaction
    //         DB::rollback();
    //     return redirect()->back()->with('failure', 'Error submitting form');
    //     }
    // }
    // public function epc(){
    //     $data = ContentEpc::first();
    //     return view('front.content.epc', compact('data'));
    // }
    // public function clientList(){
    //     $Clients = Partner::latest()->get();
    //     return view('front.content.client', compact('Clients'));
    // }
    // public function CertificateList(){
    //     $Certificates = Certificate::latest()->get();
    //     return view('front.content.certificate', compact('Certificates'));
    // }
    // public function WireRodIndex($slug){
    //     $data = (object)[];
    //     $data->ContentHome = ContentHome::first();
    //     $outputString = str_replace('-', ' ', $slug);
    //     $Category = Category::where('title', $outputString)->first();
    //     $products = Product::with('categoryDetails')->where('category_id', $Category->id)->where('status', 1)->get();
    //     return view('front.content.wire-rod', compact('data', 'products', 'outputString'));
    // }

    // public function ProductDetails($cat_slug, $slug){
    //     $Product = Product::with('categoryDetails', 'ServiceDetails')->where('slug', $slug)->first();
    //     $RelatedProducts = Product::where('slug', '!=', $slug)->limit(3)->inRandomOrder()->get();
    //     return view('front.content.product-details', compact('Product', 'RelatedProducts'));
    // }

    // public function NewsDetails($slug){
    //     $news =News::where('slug', $slug)->first();
    //     return view('front.content.news-details', compact('news'));
    // }
    
    public function career(){
        $data =Job::latest()->where('status', 1)->where('deleted_at', 1)->get();
        // Retrieve unique categories
        $uniqueCategories = Job::select('category')
        ->where('status', 1)
        ->whereNotNull('deleted_at')
        ->groupBy('category')
        ->pluck('category');

        // Retrieve unique locations
        $uniqueLocations = Job::select('location')
        ->where('status', 1)
        ->whereNotNull('deleted_at')
        ->groupBy('location')
        ->pluck('location');
        return view('front.content.career', compact('data', 'uniqueCategories', 'uniqueLocations'));
    }
    public function confirmation(){
        return view('front.content.career-confirmation');
    }
   
    public function CareerApplicationForm($slug){
        $Data = Job::where('slug', $slug)->first();
        if($Data){
            return view('front.content.career-form', compact('Data'));
        }else{
            return redirect()->back()->with('failure', 'Data not found!');
        }
    }
    public function RegisterEmailVerification(Request $request){
        $data = Career::where('email', $request->email)->first();
        if($data){
            return response()->json(['status'=>400, 'message' => 'This email is already registered. Please try again with a different email address.']);
        }else{
            $data = EmailVerification($request->email, $request->name);
            if($data!=false){
                return response()->json(['status'=>200, 'message' => 'OTP has been sent successfully.', 'data'=>$data]);
            }else{
                return response()->json(['status'=>500, 'message' => 'Oops! Something went wrong.']);
            }
        }
    }
    public function RegisterFinalSubmit(Request $request){
        // dd($request->all());
        DB::beginTransaction();
        $lastCareer = Career::latest()->first();
        try {
        if ($lastCareer) {
            $lastRegistrationId = $lastCareer->registration_id;
            $lastSerial = (int) substr($lastRegistrationId, strrpos($lastRegistrationId, '-') + 1);
            $nextSerial = $lastSerial + 1;
            $newRegistrationId = 'TIGPS-' . str_pad($nextSerial, 5, '0', STR_PAD_LEFT);
        } else {
            // If no previous data exists, start with 1
            $newRegistrationId = 'TIGPS-00001';
        }
        // Step 1: Insert data into the career table
        $career = new Career();
        $career->name = $request->name;
        $career->job_id = $request->job_id;
        $career->registration_id = $newRegistrationId;
        $career->father_name = $request->father_name;
        $career->phone = $request->phone;
        $career->email = $request->email;
        $career->date_of_birth = $request->date_of_birth; // Corrected
        $career->gender = $request->gender; // Corrected
        $career->merital_status = $request->merital_status; // Corrected
        $career->address = $request->address;
        $career->landmark = $request->landmark;
        $career->pincode = $request->pincode;
        $career->city = $request->city;
        $career->dist = $request->dist;
        $career->state = $request->state;
        $career->country = $request->country;
        $career->x_school_name = $request->x_school_name;
        $career->x_board_name = $request->x_board_name;
        $career->x_percentage = $request->x_percentage;
        $career->x_passing_year = $request->x_passing_year;
        $career->xii_school_name = $request->xii_school_name;
        $career->xii_board_name = $request->xii_board_name;
        $career->xii_percentage = $request->xii_percentage;
        $career->xii_passing_year = $request->xii_passing_year;
        $career->after_xii_qualification = $request->after_xii_qualification;
        $career->after_xii_institute_name = $request->after_xii_institute_name;
        $career->after_xii_institute_board = $request->after_xii_institute_board;
        $career->after_xii_institute_stream = $request->after_xii_institute_stream;
        $career->after_xii_institute_percentage = $request->after_xii_institute_percentage;
        $career->after_xii_institute_passing_year = $request->after_xii_institute_passing_year;
        $career->present_salary = $request->present_salary;
        $career->expected_salasry = $request->expected_salasry; // Corrected
        $career->join_time = $request->join_time;
        $career->know_anyone_at_tigs = $request->knowanyone;
        $career->referrence_details = $request->knowanyone == "Yes" ? $request->referrence_details : ""; // Corrected
        $career->applied_post = $request->applied_post;
        $career->unit_name = $request->unit_name;
        $career->subject = $request->subject;

        // Add more fields as needed

        $career->save();

        // Step 2: Check and store image files
        $imageFields = [
            'aadhar_card_file',
            'pan_card_file',
            'signature',
            'x_admit_card',
            'resume_file',
            'image_file'
        ];

        $baseUploadPath = 'images/';
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $fileName = $file->getClientOriginalName(); // You can use a custom name if needed
                $folder = 'form/'; // Or any other folder name you want
                $filePath = $file->storeAs($baseUploadPath . $folder, $fileName); // Adjust the storage path as needed
                // Store the file path in the database
                $career->$field = $filePath;
            }
        }

        // Save the career model again to update the file paths
        $career->save();
        // Step 3: Insert data into the CareerExperience table
        if ($request->has('experience_type') && $request->has('experience_duration')) {
            $experienceTypes = $request->experience_type;
            $experienceDurations = $request->experience_duration;

            foreach ($experienceTypes as $key => $type) {
                // Create a new CareerExperience instance
                $careerExperience = new CareerExperience();
                // Set attributes
                $careerExperience->career_id = $career->id;
                $careerExperience->experience_type = $type;
                $careerExperience->experience_duration = $experienceDurations[$key];
                $careerExperience->save(); // Assuming the relationship method is named 'experiences'
            }
        }
        // Commit the transaction if all steps succeed
            DB::commit();

            // Return a success response or redirect
            FinalFormSubmitMail($career->id);
            // session(['registration_id' => $career->registration_id]); 
            return response()->json(['status'=>200, 'message' => 'Data inserted successfully', 'data'=>$career->registration_id]);
        } catch (\Exception $e) {
            // If an exception occurs, rollback the transaction
            DB::rollBack();
            // Log the error or handle it accordingly
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
