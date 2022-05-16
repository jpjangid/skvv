@extends('front.layouts.app')

@section('title','Contact Us')

@section('css')

@endsection

@section('content')
<section class="about-us-section">
    <div class="container my-4">
        <div class="row justify-content-center pb-2">
            <div class="col-md-12 text-center heading-section ftco-animate fadeInUp ftco-animated">
              <h4 class="text-center text-uppercase font-weight-bold">Janardan Rai Nagar Rajasthan vidyapeeth university</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-justify" style="color: black;">
                <p>
                    <img class="pl-2 pt-1" src="./images/college.png" style="float:right; width: 35%;">
                    JRNRV (Deemed-to-be University) is a Deemed University in the city of Udaipur in the Indian state of Rajasthan. 
                    JRNRVU was established in 1937 by Pandit Janardan Rai Nagar. 
                    The university got the status of deemed university in 1987. The university is one of the oldest universities of Udaipur.
                    Currently, the university has more than 50 institutions spread across various district of Rajasthan.
                    The courses of the University are approved by UGC, AICTE, CCH, NCTE, BCI and other councils.
                </p>
                <p>
                    Ever since its inception university has been striving to maintain excellence in teaching, research and community service. 
                    Great emphasis has been laid in creating scientific temper, maintaining high ethical values and in keeping pace with emerging areas of higher learning. 
                    University has ensured overall socio-economic growth of all the sections of society by encouraging greater access and inclusive approach making it most preferred institution for higher education, learning and research.
                </p>
                <p>
                    Creation of new knowledge through research is one of the major objectives of higher education. 
                    Realizing its role in creation of new knowledge, the university has not only made visible impact on national and international levels but has also attracted interest of other institutions for collaborative research. 
                    Recognition of the Department of Botany, Geology, Physics and Zoology by UGC for its ‘Special Assistance Programme’ and is the testimony of scientific advances made by the faculty members.
                </p>
                <p>
                    The university has always felt concerned about increasing access of students from various sections of the society to higher education. 
                    By providing reservations, financial aids, scholarships and relaxation in qualifications for socially backward classes, the university has registered significant increase in access during last few years. 
                    The university aims to achieve its goal of providing higher education to create just, plural and equitable society in consonance with constitutional values.
                </p>
                <h5 class="text-uppercase font-weight-bold founder">Vision</h5>
                <p>
                    To provide knowledge and quality based education to the students by inculcating moral values, scientific temper and employing state of the art technologies. 
                    It aims to pursue excellence towards creating manpower with high degree of intellectual, professional and cultural development to meet the national and global challenges.
                </p>
                <h5 class="text-uppercase font-weight-bold founder">Mission</h5>
                <p>
                    The primary purpose of the University is to provide a learning environment in which faculty,
                    staff and students can discover, examine critically, preserve and transmit the knowledge, wisdom and values that
                    will help ensure the survival of this and future generations and improve the quality of life for all. The university seeks
                    to help students to develop an understanding and appreciation for the complex cultural and physical worlds in which
                    they live and to realize their highest potential of intellectual, physical and human development.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(function () {
      $('#demo-form').parsley().on('field:validated', function() {
        var ok = $('.parsley-error').length === 0;
        $('.bs-callout-info').toggleClass('hidden', !ok);
        $('.bs-callout-warning').toggleClass('hidden', ok);
      }).on('form:submit', function() {
        $('.submit-button').attr('disabled',true);    
      });
    });
</script>    
@endsection