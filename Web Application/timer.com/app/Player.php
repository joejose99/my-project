<?php
namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
     protected $fillable = [
       'FileNumber',
'Biometric',
'Computer',
'Surname',
'FirstName',
'OtherName',
'Gender',
'Designation',
'Sector',
'Ministry',
'Grade',
'Step',
'GrossPay',
'TotalDeduction',
'NetPay',
'BankCode',
'Bank',
'Account',
'DateofBirth',
'DateofFirstAppointment',
'DateofLastAppointment',
'Location',
'status'



    ];
}