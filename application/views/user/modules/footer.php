<?php
    ob_start();
      if(isset($_POST['register'])):
          $email = $this->input->post('email');
              $this->form_validation->set_rules('email','email','trim|required|valid_email',array('required' => 'Bạn chưa nhập email','valid_email' => 'Email không hợp lệ'));
              // $this->form_validation->set_rules('email','email','callback_check_the_existing_email_subscriber_addnew');
          if($this->form_validation->run() == FALSE):
             $nof = "Không đăng kí được!";
             $data = array(
                  'email' => $nof
              );
          else:
             $data = array(
                  'email' => $email
              );
              $this->user_model->insert_subscriber($data);
              redirect(base_url('index.html'));
          endif;
      endif;
?>
<style type="text/css">
    #news-title{
    margin-top: 10px;
    }
    #letter-title{
    color:white;
    }
    .isa_error {
      color: #D8000C;
      background-color: #FFD2D2;
    }
</style>
<div class="footer">
    <div class="footer-content clearfix">
        <div class="container">
            <div class="row">
                <div class="footer-box col-md-3 col-sm-12 col-xs-12">
                    <div class="item">
                        <h3>
                        <span>Giới thiệu</span>
                        </h3>
                    </div>
                    <ul>
                        <li>
                            <a href="#">
                            Về ch&#250;ng t&#244;i
                            </a>
                        </li>
                        <li>
                            <a href="#">
                            H&#236;nh thức thanh to&#225;n
                            </a>
                        </li>
                        <li>
                            <a href="#">
                            Quy định sử dụng
                            </a>
                        </li>
                        <li>
                            <a href="#">
                            Ch&#237;nh s&#225;ch bảo mật
                            </a>
                        </li>
                    </ul>
                </div>
            <div class="footer-box col-md-3 col-sm-12 col-xs-12">
                <div class="item">
                    <h3>
                    <span>Trợ gi&#250;p</span>
                    </h3>
                </div>
                <ul>
                    <li>
                        <a href="#">
                        Hướng dẫn thanh to&#225;n
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        Ch&#237;nh s&#225;ch b&#225;n h&#224;ng
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        Quy định thảo luận
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer-box box-address col-md-3 col-sm-12 col-xs-12">
                <div class="item">
                    <h3>
                    Thông tin công ty
                    </h3>
                <div class="box-address-content">
                    <b>C&#212;NG TY TNHH PH&#193;T TRIỂN C&#212;NG NGHỆ RUNTIME</b>
                    <p><i class="fa fa-map-marker"></i> 5/12A Quang Trung, P.14, Q.G&#242; Vấp, Tp.Hồ Ch&#237; Minh</p>
                    <p>
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:info@runtime.vn">info@runtime.vn</a>
                    </p>
                    <p>
                        <i class="fa fa-phone"></i>
                        Phone: (08) 66 85 85 38
                    </p>
                </div>
                </div>
            </div>
                <div class="footer-box box-social col-md-3 col-sm-12 col-xs-12">
                    <div class="item">
                        <h3>Facebook</h3>
                        <div class="fb-like-box" data-href="https://www.facebook.com/runtime.vn" data-width="289"
                        data-height="190" data-colorscheme="dark" data-show-faces="true" data-header="false"
                        data-stream="false" data-show-border="false">
                        </div>
                        <div class="social-icon">
                            <ul>
                                <li><a target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="https://www.facebook.com/runtime.vn" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <li><a target="_blank"><i class="fa fa-twitter "></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-box box-letter col-md-3 col-sm-12 col-xs-12" id="news-title">
                    <div class="item">
                        <h3>Đăng ký nhận tin</h3>
                        <div class="letter-title" id="letter-title">
                            <span>Hộp thư</span><i class="icon-title"></i>
                        </div>
                        <span></span>
                            <form class="form-horizontal" name="insert-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="letter-content">
                                <div class="new-paper">
                                    <div class="input-box">
                                        <input type="text" name="email" id="txtNewsletter" class="input-text form-control" value="<?php echo set_value('email'); ?>" placeholder="Your Emain Address"  />
                                    </div>
                                    <span class="isa_error"><?php echo form_error('email'); ?></span>
                                    <div class="button text-center">
                                        <input type="submit" name="register" class="btn btn-primary" value="Nhận tin">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>