@extends('dashboard.app')
@section('content')
<head>
    <!-- Toastr -->
    <link href="/dashboard/css/lib/toastr/toastr.min.css" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="/dashboard/css/lib/sweetalert/sweetalert.css" rel="stylesheet">
    <!-- Range Slider -->
    <link href="/dashboard/css/lib/rangSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="/dashboard/css/lib/rangSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bar Rating -->
    <link href="/dashboard/css/lib/barRating/barRating.css" rel="stylesheet">
    <!-- Nestable -->
    <link href="/dashboard/css/lib/nestable/nestable.css" rel="stylesheet">
    <!-- JsGrid -->
    <link href="/dashboard/css/lib/jsgrid/jsgrid-theme.min.css" rel="stylesheet" />
    <link href="/dashboard/css/lib/jsgrid/jsgrid.min.css" type="text/css" rel="stylesheet" />
    <!-- Datatable -->
    <link href="/dashboard/css/lib/datatable/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="/dashboard/css/lib/data-table/buttons.bootstrap.min.css" rel="stylesheet" />
    <!-- Calender 2 -->
    <link href="/dashboard/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <!-- Weather Icon -->
    <link href="/dashboard/css/lib/weather-icons.css" rel="stylesheet" />
    <!-- Owl Carousel -->
    <link href="/dashboard/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="/dashboard/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <!-- Select2 -->
    <link href="/dashboard/css/lib/select2/select2.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link href="/dashboard/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <!-- Calender -->
    <link href="/dashboard/css/lib/calendar/fullcalendar.css" rel="stylesheet" />

    <!-- Common -->
    <link href="/dashboard/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="/dashboard/css/lib/themify-icons.css" rel="stylesheet">
    <link href="/dashboard/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="/dashboard/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="/dashboard/css/lib/helper.css" rel="stylesheet">
    <link href="/dashboard/css/style.css" rel="stylesheet">
</head>
  <div class="content-wrap">
    <div class="main">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
              <div class="page-title">
                <h1>Hello,
                  <span>Welcome Here</span>
                </h1>
              </div>
            </div>
          </div>
          <!-- /# column -->
          <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
              <div class="page-title">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">App-Event-Calender</li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /# column -->
        </div>
        <!-- /# row -->
        <section id="main-content">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-title">
                  <h4>Calendar</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3">
                      <a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-lg btn-success btn-block waves-effect waves-light">
                        <i class="fa fa-plus"></i> Create New
                      </a>
                      <div id="external-events" class="m-t-20">
                        <br>
                        <p>Drag and drop your event or click in the calendar</p>
                        <div class="external-event bg-primary" data-class="bg-primary">
                          <i class="fa fa-move"></i>New Theme Release
                        </div>
                        <div class="external-event bg-pink" data-class="bg-pink">
                          <i class="fa fa-move"></i>My Event
                        </div>
                        <div class="external-event bg-warning" data-class="bg-warning">
                          <i class="fa fa-move"></i>Meet manager
                        </div>
                        <div class="external-event bg-dark" data-class="bg-dark">
                          <i class="fa fa-move"></i>Create New theme
                        </div>
                      </div>

                      <!-- checkbox -->
                      <div class="checkbox m-t-40">
                        <input id="drop-remove" type="checkbox">
                        <label for="drop-remove">
                          Remove after drop
                        </label>
                      </div>

                    </div>
                    <div class="col-md-9">
                      <div class="card-box">
                        <div id="calendar"></div>
                      </div>
                    </div>
                    <!-- end col -->
                    <!-- BEGIN MODAL -->
                    <div class="modal fade none-border" id="event-modal">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">
                              <strong>Add New Event</strong>
                            </h4>
                          </div>
                          <div class="modal-body"></div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                            <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Modal Add Category -->
                    <div class="modal fade none-border" id="add-category">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">
                              <strong>Add a category </strong>
                            </h4>
                          </div>
                          <div class="modal-body">
                            <form>
                              <div class="row">
                                <div class="col-md-6">
                                  <label class="control-label">Category Name</label>
                                  <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                </div>
                                <div class="col-md-6">
                                  <label class="control-label">Choose Category Color</label>
                                  <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                    <option value="success">Success</option>
                                    <option value="danger">Danger</option>
                                    <option value="info">Info</option>
                                    <option value="pink">Pink</option>
                                    <option value="primary">Primary</option>
                                    <option value="warning">Warning</option>
                                  </select>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- END MODAL -->
                  </div>
                </div>
              </div>
              <!-- /# card -->
            </div>
            <!-- /# column -->
          </div>
          <!-- /# row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="footer">
                <p>2018 © Admin Board. -
                  <a href="#">example.com</a>
                </p>
              </div>
            </div>
          </div>
        </section>

      </div>
    </div>
  </div>





  <!-- jquery vendor -->
  <script src="/dashboard/js/lib/jquery.min.js"></script>
  <script src="/dashboard/js/lib/jquery.nanoscroller.min.js"></script>
  <script src="/dashboard/js/lib/menubar/sidebar.js"></script>
  <script src="/dashboard/js/lib/preloader/pace.min.js"></script>
  <script src="/dashboard/js/lib/bootstrap.min.js"></script>
  <script src="/dashboard/js/scripts.js"></script>

  <script src="/dashboard/js/lib/jquery-ui/jquery-ui.min.js"></script>
  <script src="/dashboard/js/lib/moment/moment.js"></script>
  <script src="/dashboard/js/lib/calendar/fullcalendar.min.js"></script>
  <script src="/dashboard/js/lib/calendar/fullcalendar-init.js"></script>
  <!-- scripit init-->
@endsection