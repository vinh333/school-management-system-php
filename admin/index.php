<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
 ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Admin</title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../logo.png"
    />
    <!-- Custom CSS -->
    <link
      href="assets/libs/fullcalendar/dist/fullcalendar.min.css"
      rel="stylesheet"
    />
    <link href="assets/extra-libs/calendar/calendar.css" rel="stylesheet" />
    <link href="dist/css/style.min.css" rel="stylesheet" />
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet" />

 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <?php 
        include "inc/navbar.php";
     ?>
     <br>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >


        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <!-- Column -->
            <a href="teacher.php" class="col-md-6 col-lg-3 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                    <i class="fas fa-user"></i>
                  </h1>
                  <h6 class="text-white">Giáo Viên</h6>
                </div>
              </div>
            </a>
           <!-- Column -->
              <a href="student.php" class="col-md-6 col-lg-3 col-xlg-3">
                <div class="card card-hover">
                  <div class="box bg-success text-center">
                    <h1 class="font-light text-white">
                      <i class="fas fa-graduation-cap"></i>
                    </h1>
                    <h6 class="text-white">Sinh Viên</h6>
                  </div>
                </div>
              </a>

              <!-- Column -->
              <a href="registrar-office.php" class="col-md-6 col-lg-3 col-xlg-3">
                <div class="card card-hover">
                  <div class="box bg-warning text-center">
                    <h1 class="font-light text-white">
                      <i class="mdi mdi-collage"></i>
                    </h1>
                    <h6 class="text-white">Văn Phòng Đăng Ký</h6>
                  </div>
                </div>
              </a>

              <!-- Column -->
              <a href="course.php" class="col-md-6 col-lg-3 col-xlg-3">
                <div class="card card-hover">
                  <div class="box bg-danger text-center">
                    <h1 class="font-light text-white">
                      <i class="mdi mdi-border-outside"></i>
                    </h1>
                    <h6 class="text-white">Môn Học</h6>
                  </div>
                </div>
              </a>

         

            <!-- Sales chart -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">Thống Kê</h4>
                      <h5 class="card-subtitle">Điểm Sinh Viên</h5>
                    </div>
                  </div>
                  <div class="row">
                    <!-- column -->
                    <div class="col-lg-9">
                      <div class="flot-chart">
                        <div
                          class="flot-chart-content"
                          id="flot-line-chart"
                        ></div>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="row">
                        <div class="col-6">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-account fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">2540</h5>
                            <small class="font-light">Xuất Sắc</small>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-account fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">120</h5>
                            <small class="font-light">Giỏi</small>
                          </div>
                        </div>
                        <div class="col-6 mt-3">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-account fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">656</h5>
                            <small class="font-light">Khá</small>
                          </div>
                        </div>
                        <div class="col-6 mt-3">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-account fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">9540</h5>
                            <small class="font-light">Trung Bình</small>
                          </div>
                        </div>
                        <div class="col-6 mt-3">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-account fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">100</h5>
                            <small class="font-light">Yếu</small>
                          </div>
                        </div>
                        <div class="col-6 mt-3">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-account fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">8540</h5>
                            <small class="font-light">Kém</small>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- column -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- Biểu đồ bán hàng -->
          <!-- Cột -->
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Thông Báo</h4>
              </div>
              <div class="comment-widgets scrollable">
                <!-- Dòng Bình luận -->
                <div class="d-flex flex-row comment-row mt-0">
                  <div class="p-2">
                    <img
                      src="assets/images/users/1.jpg"
                      alt="user"
                      width="50"
                      class="rounded-circle"
                    />
                  </div>
                  <div class="comment-text w-100">
                    <h6 class="font-medium">sinhvien4212@gmail.com</h6>
                    <span class="mb-3 d-block"
                      > Thầy cấp lại mật khẩu giúp em với ạ.
                    </span>
                    <div class="comment-footer">
                      <span class="text-muted float-end">14 tháng 4, 2023</span>
                      
                    </div>
                  </div>
                </div>
                <!-- Dòng Bình luận -->
                <div class="d-flex flex-row comment-row">
                  <div class="p-2">
                    <img
                      src="assets/images/users/4.jpg"
                      alt="user"
                      width="50"
                      class="rounded-circle"
                    />
                  </div>
                  <div class="comment-text active w-100">
                    <h6 class="font-medium">sinhvien9472@gmail.com</h6>
                    <span class="mb-3 d-block"
                      >Admin cho mình xin form tạm hoãn nghĩa vụ quân sự với.
                    </span>
                    <div class="comment-footer">
                      <span class="text-muted float-end">10 tháng 5, 2023</span>
                      
                    </div>
                  </div>
                </div>
                <!-- Dòng Bình luận -->
                <div class="d-flex flex-row comment-row">
                  <div class="p-2">
                    <img
                      src="assets/images/users/5.jpg"
                      alt="user"
                      width="50"
                      class="rounded-circle"
                    />
                  </div>
                  <div class="comment-text w-100">
                    <h6 class="font-medium">giaovien8582@gmail.com</h6>
                    <span class="mb-3 d-block"
                      >Gửi giúp thầy danh sách sinh viên lớp CNTS22A
                    </span>
                    <div class="comment-footer">
                      <span class="text-muted float-end">1 tháng 8, 2023</span>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Thẻ -->
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Danh sách công việc cần làm</h4>
                <div class="todo-widget scrollable" style="height: 450px">
                  <ul
                    class="list-task todo-list list-group mb-0"
                    data-role="tasklist"
                  >
                    <li class="list-group-item todo-item" data-role="task">
                      <div class="form-check">
                        <input
                          type="checkbox"
                          class="form-check-input"
                          id="customCheck"
                        />
                        <label
                          class="form-check-label mb-0 w-100 todo-label"
                          for="customCheck"
                        >
                          <span class="todo-desc fw-normal"
                            >Nhập danh sách sinh viên khoá 2024.</span
                          >
                          <span class="badge rounded-pill bg-danger float-end"
                            >Hôm nay</span
                          >
                        </label>
                      </div>
                      <ul class="list-style-none assignedto">
                        <li class="assignee">
                          <img
                            class="rounded-circle"
                            width="40"
                            src="assets/images/users/1.jpg"
                            alt="user"
                            data-toggle="tooltip"
                            data-placement="top"
                            title=""
                            data-original-title="Steave"
                          />
                        </li>
                        <li class="assignee">
                          <img
                            class="rounded-circle"
                            width="40"
                            src="assets/images/users/2.jpg"
                            alt="user"
                            data-toggle="tooltip"
                            data-placement="top"
                            title=""
                            data-original-title="Jessica"
                          />
                        </li>
                        <li class="assignee">
                          <img
                            class="rounded-circle"
                            width="40"
                            src="assets/images/users/3.jpg"
                            alt="user"
                            data-toggle="tooltip"
                            data-placement="top"
                            title=""
                            data-original-title="Priyanka"
                          />
                        </li>
                        <li class="assignee">
                          <img
                            class="rounded-circle"
                            width="40"
                            src="assets/images/users/4.jpg"
                            alt="user"
                            data-toggle="tooltip"
                            data-placement="top"
                            title=""
                            data-original-title="Selina"
                          />
                        </li>
                      </ul>
                    </li>
                    <li class="list-group-item todo-item" data-role="task">
                      <div class="form-check">
                        <input
                          type="checkbox"
                          class="form-check-input"
                          id="customCheck1"
                        />
                        <label
                          class="form-check-label mb-0 w-100 todo-label"
                          for="customCheck1"
                        >
                          <span class="todo-desc fw-normal"
                            >Nhập điểm sinh viên học kỳ 2 khoá 2023.</span
                          ><span
                            class="badge rounded-pill bg-primary float-end"
                            >1 tuần
                          </span>
                        </label>
                      </div>
                      <div class="item-date">26 tháng 6, 2021</div>
                    </li>
                    <li class="list-group-item todo-item" data-role="task">
                      <div class="form-check">
                        <input
                          type="checkbox"
                          class="form-check-input"
                          id="customCheck2"
                        />
                        <label
                          class="form-check-label mb-0 w-100 todo-label"
                          for="customCheck2"
                        >
                          <span class="todo-desc fw-normal"
                            >Thống kê danh sách học bổng khoa Công Nghệ Thuỷ Sản</span
                          >
                          <span class="badge rounded-pill bg-info float-end"
                            >Hôm qua</span
                          >
                        </label>
                      </div>
                      <ul class="list-style-none assignedto">
                        <li class="assignee">
                          <img
                            class="rounded-circle"
                            width="40"
                            src="assets/images/users/3.jpg"
                            alt="user"
                            data-toggle="tooltip"
                            data-placement="top"
                            title=""
                            data-original-title="Priyanka"
                          />
                        </li>
                        <li class="assignee">
                          <img
                            class="rounded-circle"
                            width="40"
                            src="assets/images/users/4.jpg"
                            alt="user"
                            data-toggle="tooltip"
                            data-placement="top"
                            title=""
                            data-original-title="Selina"
                          />
                        </li>
                      </ul>
                    </li>
                    <li class="list-group-item todo-item" data-role="task">
                      <div class="form-check">
                        <input
                          type="checkbox"
                          class="form-check-input"
                          id="customCheck3"
                        />
                        <label
                          class="form-check-label mb-0 w-100 todo-label"
                          for="customCheck3"
                        >
                          <span class="todo-desc fw-normal"
                            >Gửi thông báo học phí cho tất cả sinh viên
                          </span>
                          <span
                            class="badge rounded-pill bg-warning float-end"
                            >2 tuần</span
                          >
                        </label>
                      </div>
                      <div class="item-date">26 tháng 6, 2021</div>
                    </li>
                    <li class="list-group-item todo-item" data-role="task">
                      <div class="form-check">
                        <input
                          type="checkbox"
                          class="form-check-input"
                          id="customCheck4"
                        />
                        <label
                          class="form-check-label mb-0 w-100 todo-label"
                          for="customCheck4"
                        >
                          <span class="todo-desc fw-normal"
                            >Lập Ngân Sách</span
                          >
                          <span class="badge rounded-pill bg-info float-end"
                            >Hôm qua</span
                          >
                        </label>
                      </div>
                      <ul class="list-style-none assignedto">
                        <li class="assignee">
                          <img
                            class="rounded-circle"
                            width="40"
                            src="assets/images/users/3.jpg"
                            alt="user"
                            data-toggle="tooltip"
                            data-placement="top"
                            title=""
                            data-original-title="Priyanka"
                          />
                        </li>
                        <li class="assignee">
                          <img
                            class="rounded-circle"
                            width="40"
                            src="assets/images/users/4.jpg"
                            alt="user"
                            data-toggle="tooltip"
                            data-placement="top"
                            title=""
                            data-original-title="Selina"
                          />
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
              <!-- card -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-0">Thống kê sinh viên đã đóng học phí</h4>
                  <div class="mt-3">
                    <div class="d-flex no-block align-items-center">
                      <span>81% Khoá 2021</span>
                      <div class="ms-auto">
                        <span>125</span>
                      </div>
                    </div>
                    <div class="progress">
                      <div
                        class="progress-bar progress-bar-striped"
                        role="progressbar"
                        style="width: 81%"
                        aria-valuenow="10"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                  </div>
                  <div>
                    <div class="d-flex no-block align-items-center mt-4">
                      <span>72% Khoá 2022</span>
                      <div class="ms-auto">
                        <span>120</span>
                      </div>
                    </div>
                    <div class="progress">
                      <div
                        class="progress-bar progress-bar-striped bg-success"
                        role="progressbar"
                        style="width: 72%"
                        aria-valuenow="25"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                  </div>
                  <div>
                    <div class="d-flex no-block align-items-center mt-4">
                      <span>Khoá 2023</span>
                      <div class="ms-auto">
                        <span>785</span>
                      </div>
                    </div>
                    <div class="progress">
                      <div
                        class="progress-bar progress-bar-striped bg-info"
                        role="progressbar"
                        style="width: 53%"
                        aria-valuenow="50"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                  </div>
                  <div>
                    <div class="d-flex no-block align-items-center mt-4">
                      <span>3% Khoá 2024</span>
                      <div class="ms-auto">
                        <span>8</span>
                      </div>
                    </div>
                    <div class="progress">
                      <div
                        class="progress-bar progress-bar-striped bg-danger"
                        role="progressbar"
                        style="width: 3%"
                        aria-valuenow="75"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- card chat -->
              <div class="col-lg-12">
                <!-- Card -->
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Kênh Chat</h4>
                    <div class="chat-box scrollable" style="height: 475px">
                      <!--chat Row -->
                      <ul class="chat-list">
                        <!--chat Row -->
                        <li class="chat-item">
                          <div class="chat-img">
                            <img src="assets/images/users/1.jpg" alt="user" />
                          </div>
                          <div class="chat-content">
                            <h6 class="font-medium">Thầy Nguyen Van B</h6>
                            <div class="box bg-light-info">
                              Tiến độ công việc đến đâu r mọi người
                           
                            </div>
                          </div>
                          <div class="chat-time">10:56 am</div>
                        </li>
                        <!--chat Row -->
                        <li class="chat-item">
                          <div class="chat-img">
                            <img src="assets/images/users/2.jpg" alt="user" />
                          </div>
                          <div class="chat-content">
                            <h6 class="font-medium">Thầy Tran Van A</h6>
                            <div class="box bg-light-info">
                              Khoảng 60%
                            </div>
                          </div>
                          <div class="chat-time">10:57 am</div>
                        </li>
                        <!--chat Row -->
                        <li class="odd chat-item">
                          <div class="chat-content">
                            <div class="box bg-light-inverse">
                              Mọi người cô gắn
                            </div>
                            <br />
                          </div>
                        </li>
                        <!--chat Row -->
                        <li class="odd chat-item">
                          <div class="chat-content">
                            <div class="box bg-light-inverse">
                              Trong tuần này phải hoàn thành
                            </div>
                            <br />
                          </div>
                          <div class="chat-time">10:59 am</div>
                        </li>
                        <!--chat Row -->
                        <li class="chat-item">
                          <div class="chat-img">
                            <img src="assets/images/users/3.jpg" alt="user" />
                          </div>
                          <div class="chat-content">
                            <h6 class="font-medium">Cô Nguyen Thi C</h6>
                            <div class="box bg-light-info">
                              OK
                            </div>
                          </div>
                          <div class="chat-time">11:00 am</div>
                        </li>
                        <!--chat Row -->
                      </ul>
                    </div>
                  </div>
                  <div class="card-body border-top">
                    <div class="row">
                      <div class="col-9">
                        <div class="input-field mt-0 mb-0">
                          <textarea
                            id="textarea1"
                            placeholder="Nhập nội dung"
                            class="form-control border-0"
                          ></textarea>
                        </div>
                      </div>
                      <div class="col-3">
                        <a
                          class="btn-circle btn-lg btn-cyan float-end text-white"
                          href="javascript:void(0)"
                          ><i class="mdi mdi-send fs-3"></i
                        ></a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- card -->
                
                <!-- accoridan part -->
                
                <!-- toggle part -->
                
                <!-- Tabs -->
                
              </div>
            </div>
          </div>
          <div class="row">
  <div class="col-md-12">
    <h5 class="card-title">Lịch Công Việc</h5>
    <div class="card">
      <div class="">
        <div class="row">
          <div class="col-lg-3 border-right pe-0">
            <div class="card-body border-bottom">
              <h4 class="card-title mt-2">Kéo & Thả Sự Kiện</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div id="calendar-events" class="">
                    <div class="calendar-events mb-3" data-class="bg-info">
                      <i class="fa fa-circle text-info me-2"></i>Sự Kiện Một
                    </div>
                    <div class="calendar-events mb-3" data-class="bg-success">
                      <i class="fa fa-circle text-success me-2"></i>Sự Kiện Hai
                    </div>
                    <div class="calendar-events mb-3" data-class="bg-danger">
                      <i class="fa fa-circle text-danger me-2"></i>Sự Kiện Ba
                    </div>
                    <div class="calendar-events mb-3" data-class="bg-warning">
                      <i class="fa fa-circle text-warning me-2"></i>Sự Kiện Bốn
                    </div>
                  </div>
                  <!-- checkbox -->
                  <div class="form-check">
                    <input
                      type="checkbox"
                      class="form-check-input"
                      id="drop-remove"
                    />
                    <label class="form-check-label" for="drop-remove"
                      >Xóa sau khi kéo và thả</label
                    >
                  </div>
                  <a
                    href="javascript:void(0)"
                    data-toggle="modal"
                    data-target="#add-new-event"
                    class="
                      d-flex
                      align-items-center
                      justify-content-center
                      btn
                      mt-3
                      btn-info
                      d-block
                      waves-effect waves-light
                    "
                  >
                    <i class="mdi mdi-plus fs-4 me-1"></i> Thêm Sự Kiện Mới
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="card-body b-l calender-sidebar">
              <div id="calendar"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

          <!-- BEGIN MODAL -->
          <div class="modal none-border" id="my-event">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"><strong>Add Event</strong></h4>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-hidden="true"
                  >
                    &times;
                  </button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                  <button
                    type="button"
                    class="btn btn-secondary waves-effect"
                    data-dismiss="modal"
                  >
                    Close
                  </button>
                  <button
                    type="button"
                    class="btn btn-success save-event waves-effect waves-light"
                  >
                    Create event
                  </button>
                  <button
                    type="button"
                    class="btn btn-danger delete-event waves-effect waves-light"
                    data-dismiss="modal"
                  >
                    Delete
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Add Category -->
          <div class="modal fade none-border" id="add-new-event">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"><strong>Add</strong> a category</h4>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-hidden="true"
                  >
                    &times;
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="row">
                      <div class="col-md-6">
                        <label class="control-label">Category Name</label>
                        <input
                          class="form-control form-white"
                          placeholder="Enter name"
                          type="text"
                          name="category-name"
                        />
                      </div>
                      <div class="col-md-6">
                        <label class="control-label"
                          >Choose Category Color</label
                        >
                        <select
                          class="form-select shadow-none form-white"
                          data-placeholder="Choose a color..."
                          name="category-color"
                        >
                          <option value="success">Success</option>
                          <option value="danger">Danger</option>
                          <option value="info">Info</option>
                          <option value="primary">Primary</option>
                          <option value="warning">Warning</option>
                          <option value="inverse">Inverse</option>
                        </select>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button
                    type="button"
                    class="
                      btn btn-danger
                      waves-effect waves-light
                      save-category
                    "
                    data-dismiss="modal"
                  >
                    Save
                  </button>
                  <button
                    type="button"
                    class="btn btn-secondary waves-effect"
                    data-dismiss="modal"
                  >
                    Close
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- END MODAL -->

          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
        Trường Cao Đẳng Kinh Tế Kỹ Thuật Cần Thơ.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	

    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="dist/js/jquery.ui.touch-punch-improved.js"></script>
    <script src="dist/js/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="assets/libs/moment/min/moment.min.js"></script>
    <script src="assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="dist/js/pages/calendar/cal-init.js"></script>

      <!-- Charts js Files -->
      <script src="assets/libs/chart/matrix.interface.js"></script>
    <script src="assets/libs/chart/excanvas.min.js"></script>
    <script src="assets/libs/flot/jquery.flot.js"></script>
    <script src="assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot/jquery.flot.time.js"></script>
    <script src="assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/libs/chart/jquery.peity.min.js"></script>
    <script src="assets/libs/chart/matrix.charts.js"></script>
    <script src="assets/libs/chart/jquery.flot.pie.min.js"></script>
    <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="assets/libs/chart/turning-series.js"></script>
    <script src="dist/js/pages/chart/chart-page-init.js"></script>
      
  </body>
</html>
<?php 

  }else {
    header("Location: login.php");
    exit;
  } 
}else {
    header("Location: login.php");
    exit;
} 

?>