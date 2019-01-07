@extends('layouts.client')
@section('content')


<div class="container" data-pg-collapsed>
    <hr>
        
        <div class="row" data-pg-collapsed>
            <div class="col-md-9 pl-auto pr-auto" data-pg-collapsed> 
                
                <!-- start notification container-->

                    <div class="container">
          
                            @foreach ($notfication_title as $notification)
                                <div class="alert alert-info" role="alert"> 
                                <a href="/client/notification/{{$notification->notification_id}}">
                                        <h5>EMS Support Center</h5>
                                    </a>
                                </div>
                            @endforeach
                        
                            <!-- help request comment notifications -->
                        
                            @foreach ($help_comment as $comment)
                                <div class="alert alert-info" role="alert"> 
                                <a href="/client/notification/{{$comment->notification_id}}">
                                        <h5>EMS Support Center</h5>
                                    </a>
                                </div>
                            @endforeach
                                           
                        </div>

                <!--end-->

            </div>
            <!-- Right-Pane Ads with col-md-3-->
                @include('inc.rightAds')               
            <!-- End of Ads -->
        </div>
        <!-- Bottom-Pane Ads-->
            @include('inc.bottomAds')             
        <!-- End of Ads -->
    </div>
@endsection 