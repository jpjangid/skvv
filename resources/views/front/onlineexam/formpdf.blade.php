<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addmission PDF</title>
    <style>
        .border {
            border: 1px solid black;
        }

        .tlr {
            border-top: 1px solid black;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        .lrb {
            border-bottom: 1px solid black;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        .lr {
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        .left {
            border-left: 1px solid black;
        }

        .right {
            border-right: 1px solid black;
        }

        tr {
            text-align: left;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <div>
        <table>
            <tbody>
                <tr>
                    <td colspan="10" rowspan="" class="tlr"> <img src="{{ public_path('frontend/images/skvvnewlogo.png') }}" style="height: 100px;width: 250px;margin-top: 5px; margin-left:20px;"></td>
                    <td colspan="11" class="tlr" style="padding-left: 5px;">
                        <!-- <span style="font-weight: 700;font-size: 25px;">Dr. R.K. Sharma</span> <br>
                        <span style="font-size: 12px;">M.B.B.S.,M.D.,Psychiatry(NIMHANS, Bangalore)</span><br>
                        <span style="font-size: 12px;">D.P.M. (C.I.P., Ranchi), F.I.P.S.</span> <br>
                        <span style="font-size: 12px;">Experience : AIIMS, Raipur & IHBAS, New Delhi</span> -->
                    </td>
                </tr>
                {{-- <tr><td colspan="20" class="tlr" style="font-weight: 700;font-size: 15px; padding-left:10px;"><strong>CHILD GUIDANCE CLINIC</strong></td></tr> --}}
                <tr>
                    <td colspan="5" class="tlr"><strong>Admission : </strong></td>
                    <td colspan="5" class="tlr">{{ $OnlineExam['addmission']}}</td>
                    <td colspan="5" class="tlr"><strong>Subject</strong></td>
                    <td colspan="6" class="tlr">{{ $OnlineExam['subject']}}</td>
                </tr>
                <tr>
                    <td colspan="5" class="tlr"><strong>Student Name : </strong></td>
                    <td colspan="5" class="tlr">{{ $OnlineExam['student_name']}}</td>
                    <td colspan="5" class="tlr"><strong>Father Name</strong></td>
                    <td colspan="6" class="tlr">{{ $OnlineExam['stud_father_name']}}</td>
                </tr>
                <tr>
                    <td colspan="5" class="tlr"><strong>Mother Name: </strong></td>
                    <td colspan="5" class="tlr">{{ $OnlineExam['stud_mother_name']}}</td>
                    <td colspan="5" class="tlr"><strong>Year : </strong></td>
                    <td colspan="6" class="tlr">{{ $OnlineExam['addmission_year']}}</td>
                </tr>
                <tr>
                    <td colspan="5" class="tlr"><strong>Email: </strong></td>
                    <td colspan="5" class="tlr">{{ $OnlineExam['email']}}</td>
                    <td colspan="5" class="tlr"><strong>Mobile No : </strong></td>
                    <td colspan="6" class="tlr">{{ $OnlineExam['mobile_no']}}</td>
                </tr>
                <tr>
                    <td colspan="5" class="tlr"><strong>Gender: </strong></td>
                    <td colspan="5" class="tlr">{{ $OnlineExam['gender']}}</td>
                    <td colspan="5" class="tlr"><strong>Date Of birth : </strong></td>
                    <td colspan="6" class="tlr">{{ date('d-m-Y',strtotime($OnlineExam['dob']))}}</td>
                </tr>
                <tr>
                    <td colspan="5" class="tlr"><strong>Caste: </strong></td>
                    <td colspan="5" class="tlr">{{ $OnlineExam['caste']}}</td>
                    <td colspan="5" class="tlr"><strong>Payment : </strong></td>
                    <td colspan="6" class="tlr">{{ $OnlineExam['payment']}}</td>
                </tr>
                <tr>
                    <td colspan="5" class="tlr"><strong>Payment Type: </strong></td>
                    <td colspan="5" class="tlr">{{ $OnlineExam['payment_type']}}</td>
                    <td colspan="5" class="tlr"><strong>Disability Certificate : </strong></td>
                    <td colspan="6" class="tlr">{{ $OnlineExam['disability_certificate']}}</td>
                </tr>

                <tr>
                    <td colspan="5" class="tlr"><strong>Address: </strong></td>
                    <td colspan="16" class="tlr">{{ $OnlineExam['address']}} </td>

                </tr>
                <!-- <tr>
                    <td colspan="5" class="tlr"><strong>State: </strong></td>
                    <td colspan="5" class="tlr">{{ $OnlineExam['addmission']}}</td>
                    <td colspan="5" class="tlr"><strong>City : </strong></td>
                    <td colspan="5" class="tlr">{{ $OnlineExam['addmission']}}</td>
                </tr>
                <tr>
                    <td colspan="5" class="tlr"><strong>Pincode: </strong></td>
                    <td colspan="5" class="tlr">{{ $OnlineExam['addmission']}}</td>
                    <td colspan="5" class="tlr"><strong>City : </strong></td>
                    <td colspan="5" class="tlr"></td>
                </tr> -->
                <tr>
                    <td colspan="21" class="tlr"><strong></strong></td>
                </tr>
            </tbody>
            <!-- <tbody>

            </tbody> -->
        </table>
    </div>
</body>

</html>