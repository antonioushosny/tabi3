<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
     // function send notification by Antonious Hosny for hala company 
    protected function notification($device_id ,$title,$msg,$id="0")
    {
        $path_to_fcm='https://fcm.googleapis.com/fcm/send';

        $server_key="AAAAVuQoqWk:APA91bEBQsCNDcgVUsRCpAzzmR9_RgK6bq3XKIzeTWZPPMydDr8qps8xV9uoJ1wSw2kt5ZkhbSF10tDjHBVF2q0pZfwWLqoeFFtQskhGZ4NuviNG0SGiBdINOuWx8MYgqLr3Z9shhGZl";
        $key = $device_id;
        $message = $msg;
        $title = $title ;
        $headers = array('Authorization:key=' .$server_key,'Content-Type:application/json');
        $user = User::where('device_token', $device_id)->first();
        if( $user->lang == 'ar'){
            $message = $msg['ar'];
            $title = $title['ar'] ;
        }else{
            $message = $msg['en'];
            $title = $title['en'] ;
        }
        if( $user->type == '1'){
                 $fields = array("to" => $key, "notification"=>  array( "text"=>$message ,"id"=>$id,
                    "title"=>$title,
                    "is_background"=>false,
                    "payload"=>array("my-data-item"=>"my-data-value"),
                    "timestamp"=>date('Y-m-d G:i:s'),
                    'sound' => 'default', 'badge' =>'1'
                   
                    ), "priority" => "high",
                  "data"=>  array( "message"=>$message ,
                                            "id"=>$id,
                                            "notification_type"=>$title,
                                            "is_background"=>false,
                                            "payload"=>array("my-data-item"=>"my-data-value"),
                                            "timestamp"=>date('Y-m-d G:i:s')
                                            )
                    );
        
        }
        else{
             $fields = array("to" => $key,
            "data"=>  array( "message"=>$message ,
                                "id"=>$id,
                                "notification_type"=>$title,
                                "is_background"=>false,
                                "payload"=>array("my-data-item"=>"my-data-value"),
                                "timestamp"=>date('Y-m-d G:i:s')
                                )
        );
        }
       $payload =json_encode($fields);

       $curl_session =curl_init();

       curl_setopt($curl_session,CURLOPT_URL, $path_to_fcm);

       curl_setopt($curl_session,CURLOPT_POST, true);

       curl_setopt($curl_session,CURLOPT_HTTPHEADER, $headers);

       curl_setopt($curl_session,CURLOPT_RETURNTRANSFER,true);

       curl_setopt($curl_session,CURLOPT_SSL_VERIFYPEER, false);

       curl_setopt($curl_session,CURLOPT_IPRESOLVE, CURLOPT_IPRESOLVE);

       curl_setopt($curl_session,CURLOPT_POSTFIELDS, $payload);

       $result=curl_exec($curl_session);

       curl_close($curl_session);

            //   dd($result) ;
    }
    // end send notification 
    protected function webnotification($device_id ,$title,$msg,$type)
    {
        date_default_timezone_set('Africa/Cairo');
        $path_to_fcm='https://fcm.googleapis.com/fcm/send';

        $server_key="AAAAVuQoqWk:APA91bEBQsCNDcgVUsRCpAzzmR9_RgK6bq3XKIzeTWZPPMydDr8qps8xV9uoJ1wSw2kt5ZkhbSF10tDjHBVF2q0pZfwWLqoeFFtQskhGZ4NuviNG0SGiBdINOuWx8MYgqLr3Z9shhGZl";

        $key = $device_id; 
        $user = User::where('device_token', $device_id)->first();
        if($user && $user->lang == 'en'){
            $message = $msg['en'];
            $title = $title['en'] ;
        }else{
            $message = $msg['ar'];
            $title = $title['ar'] ;
        }
        // $message = $msg;
        // $title = $title;
        $headers = array('Authorization:key=' .$server_key,'Content-Type:application/json');
        $dt = Carbon::now();
        $date  = date('Y-m-d H:i:s', strtotime($dt));
        $fields =array('to'=>$key,
            'notification' => array("title" => $title,
            "body" => $type  ,
            "click_action"=>"beitk/home",
            "sound"=>"default",
            "icon"=>"beitk/public/images/logo.png" ), 'data' => array('type' => $type ,"title" => $title,
            "message" => $message ,"date" => $date   ),

        );
        // dd($fields);
       $payload =json_encode($fields);

       $curl_session =curl_init();

       curl_setopt($curl_session,CURLOPT_URL, $path_to_fcm);

       curl_setopt($curl_session,CURLOPT_POST, true);

       curl_setopt($curl_session,CURLOPT_HTTPHEADER, $headers);

       curl_setopt($curl_session,CURLOPT_RETURNTRANSFER,true);

       curl_setopt($curl_session,CURLOPT_SSL_VERIFYPEER, false);

       curl_setopt($curl_session,CURLOPT_IPRESOLVE, CURLOPT_IPRESOLVE);

       curl_setopt($curl_session,CURLOPT_POSTFIELDS, $payload);

       $result=curl_exec($curl_session);

       curl_close($curl_session);

        // dd($result) ;
    }

    protected function sendWhatsappMessage($phone ,$body)
    {
        // $phone = "0201207908327";
        // $body = "WhatsApp API on chat-api.com works good";
        $url = "https://eu30.chat-api.com/instance95466/sendMessage?token=99tn14ud01z6jsrb";
        $data = array('phone' => $phone, 'body' => $body,);
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) {
            return 'error' ;
        }
        // return $result ; 
        // var_dump($result);
        // return 'done' ;
    }
    // end send notification 
    public function AllSeen(){
        foreach(auth()->user()->unreadNotifications as $note){
            $note->markAsRead();
        }
    }

    protected function GetDistance($lat1, $lat2, $long1, $long2, $unit) {
            // $lat1 = 24.7509789;
            // $long1 = 46.6798639;
            // $lat2 = 24.771487;       
            // $long2 = 46.7173513;
          $unit = 'k';
          $theta = $long1 - $long2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
          $unit = strtoupper($unit);
          if ($unit == "K") {
            //   return ($miles * 1.609344) . ' km';
              return ($miles * 1.609344);
          } 
          else if ($unit == "M") {
            return ($miles * 1.609344 * 1000) . ' m';
        }else if ($unit == "N") {
              return ($miles * 0.8684) . ' nm';
          } else {
              return $miles . ' mi';
          }
      }
  
      protected function GetDrivingDistanceKM($lat1, $lat2, $long1, $long2, $unit = "M") {
            //  $lat1 = 24.7509789;
            //  $long1 = 46.6798639;
            //  $lat2 = 24.771487;
            //  $long2 = 46.7173513;
            //  $unit = 'k';
          $theta = $long1 - $long2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
          $unit = strtoupper($unit);
          if ($unit == "K") {
           $distanceKm = $miles * 1.609344;
           $distanceMeter = $distanceKm * 1000;
              return $distanceKm; 
          } else if ($unit == "N") {
              return ($miles * 0.8684) . ' nm';
          } 
         else if ($unit == "M") {
             return ($miles * 1.609344 * 1000);
        }else {
              return $miles . ' mi';
          }
      }
}

