<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return $this->getOperator();
         
        //return view('home');
    }

    public function getOperator($cellnumber)
    {
      $cell = str_replace(" ","",$cellnumber);

      $cellOp = "";
      $mtnArray = ["2783", "2773", "2763"];
      $vodacomArray = ["2782", "2772", "2762"];
      $telkomArray = ["2781", "2771", "2761"];
      $cellcArray = ["2784", "2774"];

      //validation
      $cellsubtring = substr($cell, 0, 4);
      if(ctype_digit($cell) && strlen($cell)==11)
      {
        if(in_array($cellsubtring, $mtnArray))
        {
          $cellOp = "MTN";
        }
        else if(in_array($cellsubtring, $vodacomArray))
        {
          $cellOp = "Vodacom";
        }
        else if(in_array($cellsubtring, $telkomArray))
        {
          $cellOp = "Telkom";
        }
        else if(in_array($cellsubtring, $cellcArray))
        {
          $cellOp = "CellC";
        }
        else {
          $cellOp = "none";
        }
        if($cellOp != 'none')
        {
          $resultMessage = '<li class="list-group-item list-group-item-success"><strong>'.$cell.'</strong> is on <strong>'.$cellOp.'</strong></li>';
          //$resultMessage = "<strong>".$cell."</strong> is on <strong>".$cellOp."</strong>";
        }
        else {
          $resultMessage = '<li class="list-group-item list-group-item-success"><strong>We could not find a Mobile Operator for this number</strong></li>';
        }
        return $resultMessage; //['status'=>true, 'message'=>$resultMessage];
      }
      else {
        $resultMessage = '<li class="list-group-item list-group-item-danger">Please enter 11 digit number</li>';
        return $resultMessage; //['status'=>false, 'message'=>'Please enter 11 digit numeric'];
      }

    }
}
