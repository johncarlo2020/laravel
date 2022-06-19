
<body >
    <div class="container " style="padding:20px 40px 20px 40px; color:black;font-size:16px;font-family: Roboto Slab, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;">
        <div class="row justify-content-center" style='border:solid 1px rgb(134, 134, 134); border-radius:4px;'>
            <div class="col-md-8" style="padding:20px">
                <div class="card">
                    <div class="">
                        <h4 style="font-size:25px; margin: 0;">Castillejos Scholarship APPLICATION SYSTEM</h4>
                    </div>
                    @if ($data['status'] == 6 )
                    <div class="invoice p-3">
                        <h5 style="    font-size: 19px;
                        margin-bottom: 3px;margin-top:10px;
                       ">Registration Completed!</h5>
                        <p style="margin-bottom: 0;"><span class="font-weight-bold d-block mt-4">Congratulations  ,<b> {{ $data['fname'] }} {{ $data['lname'] }} </b></span></p>
                        <p style=" padding-bottom:0px;margin-bottom: 0; "><span>You are now qualified to take an examination!</span></p>
                        <div class="payment border-top mt-3 mb-3 border-bottom table-responsive" style="padding: 0 0; border-bottom:solid 1px rgb(134, 134, 134);border-top:solid 1px rgb(134, 134, 134); margin: 20px 0;">
                            <table class="table table-borderless" style="">
                                <thead>
                                    <tr>
                                        <th style="padding: 0 4px 0px 3px;font-weight: 500;text-align: start;width:33%;
                                        border-bottom: none;">Examination Date</th>
                                        <th style="padding: 0 4px 0px 3px;font-weight: 500;text-align: start;width:33%;
                                        border-bottom: none;">Examiner NO</th>
                                        <th style="padding: 0 4px 0px 3px;font-weight: 500;text-align: start;width:33%;
                                        border-bottom: none;">Examination Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="padding: 0 4px 0px 3px;color:black;text-align: start;vertical-align: top;
                                        border-bottom: none;">August 22, 2022 <br>{{ $data['time'] }}</td>
                                        <td style="padding: 0 4px 0px 3px;color:black;text-align: start;
                                        border-bottom: none;">  {{ $data['stubnum'] }}</td>
                                        <td style="padding: 0 4px 0px 3px;color:black;text-align: start;
                                        border-bottom: none;">Castillejos Municipal Hall, 3rd Floor</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p>You are scheduled to take the exam for the specific date. Please wear your face mask, bring your own ball pens, and observe physical distancing. We are hoping for a good results.</p>
                        <p class="font-weight-bold mb-0"> Good luck.!</p>
                    </div>

                    @elseif($data['status'] == 3)
                    <div class="invoice p-3">
                        <h5 style="    font-size: 19px;
                        margin-bottom: 3px;margin-top:10px;
                       ">You are now a Scholar!</h5>
                        <p style="margin-bottom: 0;"><span class="font-weight-bold d-block mt-4">Congratulations  ,<b> {{ $data['fname'] }} {{ $data['lname'] }} </b></span></p>
                        <p style=" padding-bottom:0px;margin-bottom: 0; "><span>You are now a scholar!</span></p>
                        <div class="payment border-top mt-3 mb-3 border-bottom table-responsive" style="padding: 0 0; border-bottom:solid 1px rgb(134, 134, 134);border-top:solid 1px rgb(134, 134, 134); margin: 20px 0;">
                        </div>
                        <p>Please await for futher announcements.</p>
                        <p class="font-weight-bold mb-0"> thank you.!</p>
                    </div>

                    @elseif($data['status'] == 7)
                    <div class="invoice p-3">
                        <p style="margin-bottom: 0;"><span class="font-weight-bold d-block mt-4">We regret to inform you, <b>" {{ $data['fname'] }} {{ $data['lname'] }} "</b> that your application has been declined due to the result of your examination which is lower than 75 % , the passing rate.</span> </p>
                        <p style=" padding-bottom:0px;margin-bottom: 0; "><span>Please try again next year!</span></p>
                        <div class="payment border-top mt-3 mb-3 border-bottom table-responsive" style="padding: 0 0; border-bottom:solid 1px rgb(134, 134, 134);border-top:solid 1px rgb(134, 134, 134); margin: 20px 0;">
                        </div>
                        <p>We hope for your success next time.</p>
                        <p class="font-weight-bold mb-0"> Thank you.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>


{{-- @component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}

