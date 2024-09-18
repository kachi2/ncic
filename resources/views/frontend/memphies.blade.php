@extends('layouts.app')
@section('contents')
@section('style')
    <style>
        input[type='file'] {
            display: none
        }

        label {
            padding: 10px 20px;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block;
        }

        #file-name {
            margin-top: 10px;
            font-style: italic;
            color: #888;
        }
    </style>
@endsection
@if (isset($breadcrums))
    <div class="page-header-area" style="background: #ddd url('{{ asset('/images/' . $breadcrums->image) }}')  ">
    @else
        <div class="page-header-area" style="background: #ddd url('{{ asset('/images') }}') no-repeat center">
@endif
<div class="container">
    <div class="row align-items-center">
        <div class="col-md-6 col-lg-4">
            <div class="page-header-title text-center text-md-start">
                {{-- <h1>Blog Details</h1> --}}
            </div>
        </div>

        {{-- <div class="col-md-6 col-lg-8">
                <nav class="page-header-breadcrumb text-center text-md-end">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}">Home</a></li>
                        <li class="active"><a href="">Blog Details</a></li>
                    </ul>
                </nav>
            </div> --}}
    </div>
</div>
</div>
{{-- {{dd($email)}} --}}

<div class="page-content-wrap pt-90 pt-sm-60 pb-90 pb-sm-60 mb-xl-30">
    <div class="service-details-page-wrap">

        <div class="container">

            <form action="{{ route('users.UpdateForm') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-9 order-0"
                        style="margin:0px auto; width:700px; border:1px solid #8686867e; padding:30px">

                        <p style="text-align:center">
                            <img src="{{ asset('/assets/Picture.png') }}" alt="" style="width: 300px">

                        </p>
                        <p style="text-align:center; font-size:22px; text-decoration:underline">
                            <a href="" style="color:#000">EXHIBIT A</a>
                        </p>
                        <p
                            style="text-align:center;color:#000; font-size:18px; font-family:'Times New Roman', Times, serif">
                            STUDENT CONSENT FOR RELEASE OF INFORMATION
                        </p>

                        <div
                            style=" padding-top:10px; text-align:left;color:#000; font-size:18px; font-family:'Times New Roman', Times, serif">


                            <p>
                                I understand that if I am admitted and enroll at The University of Memphis, the federal
                            </p>
                            <p>
                                <span style="font-style: italic">Family Educational Rights and Privacy Act of
                                    1972</span> (FERPA) protects the privacy of my
                                education records. As a prospective student, I also may have rights under the laws of
                                the
                                United States, the State of Tennessee and/or my country of residence protecting the
                                privacy of records I give to <span style="font-style: italic"> UNIVERSITY </span> and/or
                                third parties in connection with my
                                application to enroll as a <span style="font-style: italic"> UNIVERSITY </span> student.
                            </p>
                            <p>
                                By signing this form, I, <input
                                    style="border:none; border-bottom:1px solid #000; width:350px; padding-left:10px"
                                    value="{{ strtoupper($users?->name) }}"> , hereby <span style="font-weight: bold">
                                    waive</span>
                                any rights described above and <span style="font-weight: bold"> give my consent </span>
                                to <span style="font-style: italic"> UNIVERSITY </span> and the person /
                                PARTNER named below to disclose my application and any other education records to
                                each other for the purpose of discussing my application to, admission status and
                                educational experience at <span style="font-style: italic"> UNIVERSITY </span>
                            </p>
                            <p>
                            <div class="row">
                                {{-- <div class="col-md-4 col-6"> --}}
                                    {{-- Name of Person: <br>
                                    Name of PARTNER:<br>
                                    Address:<br>
                                    Phone Number:<br>
                                    Email Address:<br> --}}
                                {{-- </div> --}}
                                <div class="col-md-12 col-12" style="float: left; overflow:scroll">
                                    Name of Person:  <input style="border:none; border-bottom:1px solid #000; width:420px" value="RACHEAL AKANBI" readonly> <br>
                                    Name of Partner: <input style="border:none; border-bottom:1px solid #000; width:420px" value="OTEGEE CONCEPTS" readonly> <br>
                                    Address:<input style="border:none; border-bottom:1px solid #000; width:420px" value="4, ADO IBRAHIM STREET, YABA, LAGOS, NIGERIA" readonly> <br>
                                    Phone Number: <input style="border:none; border-bottom:1px solid #000; width:420px"value="+234-705-827-4708" readonly> <br>
                                    Email Address:  <input style="border:none; border-bottom:1px solid #000; width:420px" value="INFO@OTEGEECONCEPTS.COM.NG" readonly> <br>
                                </div>

                            </div>


                            </p>
                            <p style="padding-top:10px">
                                I understand that I have the right <span style="font-weight: bold"> not </span> to
                                consent to the release of information in my
                                student records and that <span style="font-weight: bold"> I </span> may revoke this
                                consent at any time by giving written notice to
                                <span style="font-style: italic"> UNIVERSITY </span> and the person / <span
                                    style="font-style: italic"> PARTNER </span> named above. This consent remains valid
                                unless and until I revoke it.
                            </p>

                            <p style="padding-top:10px">
                                Prospective Student Signature: @if (isset($users?->student_signature))
                                    <img src="{{ asset('images/'.$users?->student_signature) }}" width="100px">
                                @else
                                    <label for="signature" style="background-color: #608ef275; color:#000; padding:2px">
                                        Upload Signature </label>
                                    <input type="file" id="signature" name="student_signature"> <span
                                        id="signature-lable" style="color:red"></span>
                                @endif <br>
                                Prospective Student Name (print):<input
                                    style="border:none; border-bottom:1px solid #000; width:350px;  padding-left:10px"
                                    value="{{ strtoupper($users?->name) }}"><br>
                                Date:<input style="border:none; border-bottom:1px solid #000; width:350px"
                                    name="date_signed" placeholder="dd-mm-yy" value="{{ $users?->date_signed }}"><br>
                            </p>
                            <p style="padding-top:10px">
                                <span style="font-weight: bold"> If Prospective Student is under 18 years of age:
                                </span>
                            </p>

                            <p style="padding-top:10px">
                                I am the parent or legal guardian of the Prospective Student. I am signing this document
                                on his or her behalf.
                            </p>

                            <p style="padding-top:10px">
                                Parent or Guardian Signature:@if (isset($users?->parent_signature))
                                    <img src="{{ asset('images/'.$users?->parent_signature) }}" width="100px">
                                @else
                                    <label for="signatures"
                                        style="background-color: #608ef275; color:#000; padding:2px"> Upload Signature
                                    </label>
                                    <input type="file" id="signatures" name="parent_signature"> <span
                                        id="signature-lables" style="color:red"></span>
                                @endif
                                <br>
                                Parent or Guardian Name (print):<input
                                    style="border:none; border-bottom:1px solid #000; width:350px"
                                    name="parent_name"><br>
                                Date:<input style="border:none; border-bottom:1px solid #000; width:350px"
                                    value="{{ $users?->parent_date_signed }}"><br>
                            </p>
                        </div>


                        <div>

                            <input type="hidden" name="email" value="{{ $users?->email }}">

                        </div>

                        {{-- <div class="service-details-content">
                        <h2>{{$pages->title}}</h2>
                        <hr>
                            <div class="project-details-thumb ht-slick-slider" data-slick='{"arrows": false, "dots": true}'>
                              
                                <figure class="project-thumb-item">
                                    <img src="{{asset('images/'.$pages->metas)}}" alt="Project"/>
                                </figure>
                            </div>
                            <div class="service-details-info">
                            
                            <p>{!! $pages->contents !!}</p>

                            
                        </div>

                    </div> --}}
                        <p style="padding-top:20px">
                            @if (isset($users?->document))
                                <img src="{{ asset('images/'.$users?->document) }}" width="100px">
                            @endif
                            Did you use the offline consent form?
                            <label for="file" style="background-color: #5cb85c;"> Cick here to upload Form </label>
                            <input type="file" id="file" name="document">
                            <span id="file-name" style="color:red"></span>
                        </p>

                        <p style="padding-top:20px">
                            @if (isset($users?->resume))
                                <img src="{{ asset('images/'.$users?->parent_signature) }}" width="100px">
                            @endif
                            <label for="Resume" style="background-color: #8c580f;"> Upload Your Resume </label>
                            <input type="file" id="Resume" name="resume">
                            <span id="Resume-file" style="color:red"></span>
                        </p>

                        <p style="padding-top:20px">
                            @if (isset($users?->personal_statement))
                                <img src="{{ asset('images/'.$users?->personal_statement) }}" width="100px">
                            @endif
                            <label for="Statement" style="background-color: #1e2e98;"> Upload Personal Statement
                            </label>
                            <input type="file" id="Statement" name="personal_statement">
                            <span id="Statement-file" style="color:red"></span>
                        </p>


                        <p style="padding-top:10px"> @php echo captcha_img() @endphp </p>
                        <p><input type="text" placeholder="Enter captcha" name="captcha" required>
                        </p>
                        <p style="padding:20px 0px">
                            @if (!isset($users?->personal_statement))
                                <button class="btn btn-primary w-50"> Submit Form</button>
                            @endif
                        </p>
                        @if (Session::has('message'))
                            <span class="alert alert-{{ Session::get('alert') }}">
                                {{ Session::get('message') }}</span>
                        @endif
                    </div>

                    <div class="col-lg-3  order-lg-0">
                        <aside class="sidebar-wrapper">
                            <!-- Start Single Sidebar -->
                            <div class="sidebar-item">

                                <h3 class="sidebar-title">INSTRUCTIONS</h3>
                                <div class="sidebar-body">
                                    <ul class="sidebar-list">

                                        <li> 1. Click the empty lines and enter required information </li>
                                        <li> 2. Click on Upload Signature</li>
                                        <li> 3.Sign your  Signature on a white paper, snap and upload </li>
                                        <li> 4. Upload Personal Statement </li>
                                        <li> 5. Upload your Resume </li>
                                        <li> 6. Click submit Form button to submit</li>
                                        <li> 7. Close window</li>
                                    </ul>
                                </div>
                            </div>
                            <p style="color:#072490; font-size:23px; font-weight:bolder"> If you prefer to fill the Consent Form offline</p>
                            <a href="{{ asset('/images/ConsentForm.pdf') }}" target="_blank"
                                class="btn btn-primary">CLICK HERE TO DOWNLOAD</a>

                        </aside>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
    integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    const fileInput = document.getElementById('file');
    const fileNameDisplay = document.getElementById('file-name');

    // Display the chosen file name
    fileInput.addEventListener('change', function() {
        const fileName = this.files[0] ? this.files[0].name : '';
        fileNameDisplay.textContent = fileName;
    });
</script>

<script>
    const signatr = document.getElementById('signature');
    const fileNameDisplasy = document.getElementById('signature-lable');

    // Display the chosen file name
    signatr.addEventListener('change', function() {
        const fileNames = this.files[0] ? this.files[0].name : '';
        fileNameDisplasy.textContent = fileNames;
    });
</script>
<script>
    const signatrs = document.getElementById('signatures');
    const fileNameDisplasys = document.getElementById('signature-lables');

    // Display the chosen file name
    signatrs.addEventListener('change', function() {
        const filesNames = this.files[0] ? this.files[0].name : '';
        fileNameDisplasys.textContent = filesNames;
    });
</script>

<script>
    const Resume = document.getElementById('Resume');
    const fileNameDisplasyResume = document.getElementById('Resume-file');

    // Display the chosen file name
    Resume.addEventListener('change', function() {
        const Resumes = this.files[0] ? this.files[0].name : '';
        fileNameDisplasyResume.textContent = Resumes;
    });
</script>
<script>
    const personal_statment = document.getElementById('Statement');
    const personal_statmentsss = document.getElementById('Statement-file');

    // Display the chosen file name
    personal_statment.addEventListener('change', function() {
        const personal_statments = this.files[0] ? this.files[0].name : '';
        personal_statmentsss.textContent = personal_statments;
    });
</script>

<script>
    window.jsPDF = window.jspdf.jsPDF;
    window.html2canvas = html2canvas;
    let downloadBtn = document.getElementById('downloadBtn');
    downloadBtn.addEventListener("click", createPdf);

    let printBtn = document.getElementById('printBtn');
    printBtn.addEventListener("click", printPage);

    function createPdf() {
        html2canvas(document.getElementById('pdfContent')).then(canvas => {
            let source = $('#pdfContent')[0];
            const doc = new jsPDF({
                unit: "pt",
                orientation: 'portrait'
            });

            let margins = {
                top: 50,
                bottom: 50,
                left: 50,
                width: 500
            }

            let specialElementHandlers = {
                '#hasCharr': function(element, renderer) {
                    return true;
                }
            };

            doc.setFont('Poppins-Bold', 'bold');
            doc.html(source, {
                x: margins.left,
                y: margins.top,
                width: margins.width,
                windowWidth: 900,
                elementHandlers: specialElementHandlers,
                callback: function() {
                    doc.save("another.pdf", margins)
                }
            });
        });
    }

    function printPage() {
        window.print();
        // setTimeout(() => {
        //     window.close();
        // }, 10000);
    }


    $('div[data-id=imageView1]').on('click', () => {
        $('#imageView1').modal('show');
    });

    $('div[data-id=imageView2]').on('click', () => {
        $('#imageView2').modal('show');
    });

    $('body').on('click', () => {
        $('#imageView1').modal('hide');
    });
    $('body').on('click', () => {
        $('#imageView2').modal('hide');
    });
</script>
@endsection
