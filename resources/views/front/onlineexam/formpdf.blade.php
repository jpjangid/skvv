<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        body {
            font-size: 13px;
            font-family: 'hind', serif;
        }
        
        .border {
            border: 1px solid black;
        }

        .tlr {
            border-top: 1px solid black;
            border-left: 1px solid black;
            border-right: 1px solid black;
            border-bottom: 1px solid black;
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

        /* . border
        {
            border-bottom: 1px solid black;
        } */
        /* .clgdetails{
            line-height: 1.1;
        } */
    </style>
</head>

<body>
    <div>
        <table>
            <tbody>
                <tr>
                    <td colspan="4">
                        <img src="{{ public_path('frontend/images/SKVV_Logo.jpg') }}" style="height: 80px; width:80px; text-align:center; ">
                    </td>
                    <td colspan="11">
                        <h3 style="color: #ff5454; margin: 0;">Shree Kallaji Vedic Vishvavidyalaya</h3>
                        <!-- <p style="margin: 0;">श्री कल्लाजी वैदिक विश्वविद्यालय</p> -->
                        <h4 style="margin: 0;">JJ49+GWQ, Kalyanlok, Nimbahera, Chittorgarh, Rajasthan 312601</h4>
                    </td>
                    <td colspan="6">
                        <img src="{{ public_path('storage/onlineexam/'.$OnlineExam->stud_image) }}" style="height: 100px;width: 100px;">
                    </td>
                </tr>
                <!-- <tr>
                    <td colspan="4" rowspan="" class="tlr" style="">
                        <img src="{{ public_path('frontend/images/SKVV_Logo.jpg') }}" style="height: 80px;text-align:center; ">
                    <td colspan="11">
                            <h3 style="color: #ff5454; margin: 0;">Shree Kallaji Vedic Vishvavidyalaya</h3>
                            <h4 style="margin: 0;">Shree Kallaji Vedic Vishvavidyalaya</h4>
                            <p style="margin: 0;">JJ49+GWQ, Kalyanlok, Nimbahera, Chittorgarh, Rajasthan 312601</p>
                    </td>
                    <td colspan="6" rowspan="" class="tlr"> <img src="{{ public_path('storage/onlineexam/'.     $OnlineExam->stud_image) }}" style="height: 100px;width: 100px;">
                    </td>
                </tr> -->
                <tr>
                    <td colspan="21" class="tlr"><strong><b>Student Details :</b> </strong></td>
                </tr>
                <tr>
                    <td colspan="5" class="tlr"><strong>Admission : </strong></td>
                    <td colspan="5" class="tlr">{{ $OnlineExam['addmission']}}</td>
                    <td colspan="5" class="tlr"><strong>Year : </strong></td>
                    <td colspan="6" class="tlr">{{ $OnlineExam['addmission_year']}}</td>
                </tr>
                <tr>
                    <td colspan="5" class="tlr"><strong>Subject</strong></td>
                    <td colspan="5" class="tlr">{{ $OnlineExam['subject']}}</td>
                    <td colspan="5" class="tlr"><strong>Student Name : </strong></td>
                    <td colspan="6" class="tlr">{{ $OnlineExam['student_name']}}</td>
                    4
                </tr>
                <tr>
                    <td colspan="5" class="tlr"><strong>Father Name</strong></td>
                    <td colspan="5" class="tlr">{{ $OnlineExam['stud_father_name']}}</td>
                    <td colspan="5" class="tlr"><strong>Mother Name: </strong></td>
                    <td colspan="6" class="tlr">{{ $OnlineExam['stud_mother_name']}}</td>
                </tr>
                <tr>
                    <td colspan="5" class="tlr"><strong>Mobile No : </strong></td>
                    <td colspan="5" class="tlr">{{ $OnlineExam['mobile_no']}}</td>
                    <td colspan="5" class="tlr"><strong>Adhaar Number: </strong></td>
                    <td colspan="6" class="tlr">{{ $OnlineExam['adhaar_no']}}</td>
                </tr>
                <tr>
                    <td colspan="5" class="tlr"><strong>Email: </strong></td>
                    <td colspan="5" class="tlr">{{ $OnlineExam['email']}}</td>
                    <td colspan="5" class="tlr"><strong>Gender: </strong></td>
                    <td colspan="6" class="tlr">{{ $OnlineExam['gender']}}</td>
                </tr>
                <tr>
                    <td colspan="5" class="tlr"><strong>Date Of birth : </strong></td>
                    <td colspan="5" class="tlr">{{ date('d-m-Y',strtotime($OnlineExam['dob']))}}</td>
                    <td colspan="5" class="tlr"><strong>Nationality: </strong></td>
                    <td colspan="6" class="tlr">{{ $OnlineExam['nationalilty']}}</td>
                </tr>

                <tr>
                    <td colspan="5" class="tlr"><strong>Address: </strong></td>
                    <td colspan="16" class="tlr">{{ $OnlineExam['address']}} </td>

                </tr>

                <tr>
                    <td colspan="5" class="tlr"><strong>State: </strong></td>
                    <td colspan="5" class="tlr"> {{ $Location->state_name }} </td>
                    <td colspan="5" class="tlr"><strong>City : </strong></td>
                    <td colspan="6" class="tlr">{{ $Location->city_name}}</td>
                </tr>



                <tr>
                    <td colspan="5" class="tlr"><strong>Pincode: </strong></td>
                    <td colspan="5" class="tlr">{{ $Location->pincode}}</td>
                    <td colspan="5" class="tlr"><strong>Caste : </strong></td>
                    <td colspan="6" class="tlr">{{ $OnlineExam['caste']}}</td>
                </tr>

                <tr>
                    <td colspan="5" class="tlr"><strong>Payment : </strong></td>
                    <td colspan="5" class="tlr">{{ $OnlineExam['payment']}}</td>
                    <td colspan="5" class="tlr"><strong>Payment Type: </strong></td>
                    <td colspan="6" class="tlr">{{ $OnlineExam['payment_type']}}</td>
                </tr>
                <tr>
                    <td colspan="21" class="tlr"><strong></strong></td>
                </tr>
            </tbody>
            <!-- <tbody>

            </tbody> -->
        </table>
    </div>
    <table>
        <tr>
            <!-- <th colspan="16">Qualification</th> -->
        </tr>
        <tr>
            <td rowspan="2" class="tlr">उत्तीर्ण परीक्षा </td>
            <td rowspan="2" class="tlr">बोर्ड / विश्वविद्यालय का नाम</td>
            <td rowspan="2" class="tlr">उत्तीर्ण करने का वर्ष </td>
            <td rowspan="2" class="tlr">विषय </td>
            <td colspan="4" style="text-align: center;" class="tlr">योग्यता मे प्राप्त अंकों का विवरण</td>

        </tr>
        <tr>
            <td class="tlr">पूर्णांक </td>
            <td class="tlr">प्राप्तांक </td>
            <td class="tlr">प्रतिशत</td>
            <td class="tlr">श्रेणी </td>
        </tr>
        <tbody>
            @foreach ($QualificationDetails as $QualificationDetail)
            <tr style="text-align:center;">
                <td class="tlr">{{ $QualificationDetail->qualifications }}</td>
                <td class="tlr">{{ $QualificationDetail->qualificationsname_of_board_university }}</td>
                <td class="tlr">{{ $QualificationDetail->passing_year }}</td>
                <td class="tlr">{{ $QualificationDetail->subject }}</td>
                <td class="tlr">{{ $QualificationDetail->marks }}</td>
                <td class="tlr">{{ $QualificationDetail->total_marks }}</td>
                <td class="tlr">{{ $QualificationDetail->percentage }}</td>
                <td class="tlr">{{ $QualificationDetail->grade }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td colspan="21" class="tlr">(1)आवेदन पत्र में दी गयी समस्त सूचनाएं जहां तक मेरी जानकारी है, सही है तथा कुछ भी तथ्य छिपाया नहीं गया है। यदि मैं प्रवेश अर्हता को पूरा नहीं करता/करती हूँ तथा मेरे द्वारा कोई सूचना गलत पाई जाती है तो मेरा प्रवेश रद्द किया जा सकता है।</td>
            </tr>
            <tr>
                <td colspan="21" class="tlr">(2)राजस्थान संपत्ति विरूपण निवारण अधिनियम 2006 के अंतर्गत यदि मै विश्वविद्यालय की संपत्ति को विरूपित/नुकसान करता हूँ/करती हूँ तो मेरे विरुद्ध नियमानुसार कार्यवाही की जा सकेगी तथा मै अथवा मेरे अभिभावक क्षतिपूर्ति के लिए बाध्य होंगे।</td>
            </tr>
            <tr>
                <td colspan="21" class="tlr">(3)माननीय सर्वोच्च न्यायालय के आदेशानुसार मैं विश्वविद्यालय में किसी प्रकार की रैगिंग एवं अवांछित गतिविधियो में सम्मिलित नहीं होऊंगा/होउंगी ।</td>
            </tr>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td colspan="4" class="tlr">Date:{{date("l jS \of F Y h:i:s A")}}</td>
                <td colspan="6" class="tlr">Signature</td>
                <!-- <td colspan="11" class="tlr">onnnn</td> -->
                <td colspan="11" class="tlr"> <img src="{{ public_path('storage/onlineexam/'.$OnlineExam->stud_image) }}" style="height: 100px;width: 100px;margin-top: 0px; margin-left:50px; object-fit:cover"></td>
            </tr>
        </tbody>
    </table>
</body>

</html>