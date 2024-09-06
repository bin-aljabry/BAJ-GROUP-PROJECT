<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Helper{

    public static function CompanyIDGenerator( $model , $trow, $length = 10, $prefix ) {

        $data=$model:: orderBy('id','desc')->first();
        if(!$data){
            $og_length=$length;
            $last_number='';

        }
        else{
           $code=substr($data->$trow,strlen($prefix)+1);
            $code=(integer)$code;
            $actial_last_number=(($code)/1)*1;
            $increment_last_number= $actial_last_number  +1;
            $last_number_length=strlen($increment_last_number);
            $og_length=$length-$last_number_length;
            $last_number=$increment_last_number;

    }
    $zeros='';
    for($i= 0 ; $i < $og_length; $i++){
        $zeros.= '0';
    }
    return $prefix.'-'.$zeros.$last_number;
    }

    public static function BranchIDGenerator($model , $trow,  $length = 6,  $prefix ) {

        $data=$model:: orderBy('id','desc')->first();
        if(!$data){
            $og_length=$length;
            $last_number='';

        }
        else{
           $code=substr($data->$trow,strlen($prefix)+1);
            $code=(integer)$code;
            $actial_last_number=(($code)/1)*1;
            $increment_last_number= $actial_last_number  +1;
            $last_number_length=strlen($increment_last_number);
            $og_length=$length-$last_number_length;
            $last_number=$increment_last_number;

    }
    $zeros='';
    for($i= 0 ; $i < $og_length; $i++){
        $zeros.= '0';
    }
    return $prefix.'-'.$zeros.$last_number;
}
public static function TellerIDGenerator($model , $trow, $length = 3, $prefix ) {

    $data=$model:: orderBy('id','desc')->first();
    if(!$data){
        $og_length=$length;
        $last_number='';

    }
    else{
       $code=substr($data->$trow,strlen($prefix)+1);
        $code=(integer)$code;
        $actial_last_number=(($code)/1)*1;
        $increment_last_number= $actial_last_number  +1;
        $last_number_length=strlen($increment_last_number);
        $og_length=$length-$last_number_length;
        $last_number=$increment_last_number;

}
$zeros='';
for($i= 0 ; $i < $og_length; $i++){
    $zeros.= '0';
}
return $prefix.'-'.$zeros.$last_number;
}
public static function TellerCapitalIDGenerator($model , $trow, $length = 3, $prefix ) {

    $data=$model:: orderBy('id','desc')->first();
    if(!$data){
        $og_length=$length;
        $last_number='';

    }
    else{
       $code=substr($data->$trow,strlen($prefix)+1);
        $code=(integer)$code;
        $actial_last_number=(($code)/1)*1;
        $increment_last_number= $actial_last_number  +1;
        $last_number_length=strlen($increment_last_number);
        $og_length=$length-$last_number_length;
        $last_number=$increment_last_number;

}
$zeros='';
for($i= 0 ; $i < $og_length; $i++){
    $zeros.= '0';
}
return $prefix.'-'.$zeros.$last_number;
}

public static function CategoryExpIDGenerator($model , $trow, $length = 2, $prefix ) {

    $data=$model:: orderBy('id','desc')->first();
    if(!$data){
        $og_length=$length;
        $last_number='';

    }
    else{
       $code=substr($data->$trow,strlen($prefix)+1);
        $code=(integer)$code;
        $actial_last_number=(($code)/1)*1;
        $increment_last_number= $actial_last_number  +1;
        $last_number_length=strlen($increment_last_number);
        $og_length=$length-$last_number_length;
        $last_number=$increment_last_number;

}
$zeros='';
for($i= 0 ; $i < $og_length; $i++){
    $zeros.= '0';
}
return $prefix.'-'.$zeros.$last_number;
}

public static function CategoryIncomeIDGenerator($model , $trow, $length = 2, $prefix ) {

    $data=$model:: orderBy('id','desc')->first();
    if(!$data){
        $og_length=$length;
        $last_number='';

    }
    else{
       $code=substr($data->$trow,strlen($prefix)+1);
        $code=(integer)$code;
        $actial_last_number=(($code)/1)*1;
        $increment_last_number= $actial_last_number  +1;
        $last_number_length=strlen($increment_last_number);
        $og_length=$length-$last_number_length;
        $last_number=$increment_last_number;

}
$zeros='';
for($i= 0 ; $i < $og_length; $i++){
    $zeros.= '0';
}
return $prefix.'-'.$zeros.$last_number;
}

public static function IncomeIDGenerator($model , $trow, $length = 3, $prefix ) {

    $data=$model:: orderBy('id','desc')->first();
    if(!$data){
        $og_length=$length;
        $last_number='';

    }
    else{
       $code=substr($data->$trow,strlen($prefix)+1);
        $code=(integer)$code;
        $actial_last_number=(($code)/1)*1;
        $increment_last_number= $actial_last_number  +1;
        $last_number_length=strlen($increment_last_number);
        $og_length=$length-$last_number_length;
        $last_number=$increment_last_number;

}
$zeros='';
for($i= 0 ; $i < $og_length; $i++){
    $zeros.= '0';
}
return $prefix.'-'.$zeros.$last_number;
}

public static function TransactionIDGenerator( $model , $trow, $length =15, $prefix ) {

    $data=$model:: orderBy('id','desc')->first();
    if(!$data){
        $og_length=$length;
        $last_number='';

    }
    else{
       $code=substr($data->$trow,strlen($prefix)+1);
        $code=(integer)$code;
        $actial_last_number=(($code)/1)*1;
        $increment_last_number= $actial_last_number  +1;
        $last_number_length=strlen($increment_last_number);
        $og_length=$length-$last_number_length;
        $last_number=$increment_last_number;

}
$zeros='';
for($i= 0 ; $i < $og_length; $i++){
    $zeros.= '0';
}
return $prefix.'-'.$zeros.$last_number;
}


public static function TransactionFloatIDGenerator( $model , $trow, $length =15, $prefix ) {

    $data=$model:: orderBy('id','desc')->first();
    if(!$data){
        $og_length=$length;
        $last_number='';

    }
    else{
       $code=substr($data->$trow,strlen($prefix)+1);
        $code=(integer)$code;
        $actial_last_number=(($code)/1)*1;
        $increment_last_number= $actial_last_number  +1;
        $last_number_length=strlen($increment_last_number);
        $og_length=$length-$last_number_length;
        $last_number=$increment_last_number;

}
$zeros='';
for($i= 0 ; $i < $og_length; $i++){
    $zeros.= '0';
}
return $prefix.'-'.$zeros.$last_number;
}




public static function TellerTransaction( $model , $trow, $length = 10, $prefix ) {

    $data=$model:: orderBy('id','desc')->first();
    if(!$data){
        $og_length=$length;
        $last_number='';

    }
    else{
       $code=substr($data->$trow,strlen($prefix)+1);
        $code=(integer)$code;
        $actial_last_number=(($code)/1)*1;
        $increment_last_number= $actial_last_number  +1;
        $last_number_length=strlen($increment_last_number);
        $og_length=$length-$last_number_length;
        $last_number=$increment_last_number;

}
$zeros='';
for($i= 0 ; $i < $og_length; $i++){
    $zeros.= '0';
}
return $prefix.'-'.$zeros.$last_number;
}
}
