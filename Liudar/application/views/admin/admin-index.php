<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Amaze UI Admin index Examples</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <base href="<?php echo site_url();?>">

  <link rel="icon" type="image/png" href="assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="assets/css/admin.css">
  <style>

  .hidden{
    display: none;
  }
  </style>
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<?php include 'admin-header.php'; ?>

<div class="am-cf admin-main">
  <?php include 'admin-sidebar.php'; ?>

  <!-- content start -->
  <div class="admin-content">
     
    <div class="am-g hotel-order hidden">
            <div class="am-u-sm-12">
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th >单号</th>
                        <th >入住时间</th>
                        <th >离店时间</th>
                        <th>订购时间</th>
                        <th >价格</th>
                        <th >操作</th>
                    </tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                </table>
               
            </div>

    </div>
    
    <div class="am-g local-order hidden">
            <div class="am-u-sm-12">
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th >单号</th>
                        <th >入住时间</th>
                        <th >离店时间</th>
                        <th>订购时间</th>
                        <th >价格</th>
                        <th >操作</th>
                    </tr>
                    </thead>
                    <tbody id="tbody-local">

                    </tbody>
                </table>
               
            </div>

    </div>
    <div class="am-g hotel-info hidden">
      <form class="am-form" action="admin/update_blog" method="post" enctype="multipart/form-data">
        <input type="hidden" name="blog_id" value="">
      <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">酒店信息</strong> / <small>form</small></div>
      </div>

      <div class="am-tabs am-margin" data-am-tabs>
        <ul class="am-tabs-nav am-nav am-nav-tabs">
          <li><a href="#tab2">详细描述</a></li>
        </ul>

        <div class="am-tabs-bd">


          <div class="am-tab-panel am-fade" id="tab2">
              <div class="am-g am-margin-top">
                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                  酒店名称
                </div>
                <div class="am-u-sm-8 am-u-md-4">
                  <input type="text" class="am-input-sm" name="title" value="">
                </div>
                <div class="am-hide-sm-only am-u-md-6">*需提供工商注册商家名字</div>
              </div>



              <div class="am-g am-margin-top">
                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                  酒店主图
                </div>
                <div class="am-u-sm-8 am-u-md-4">
                  <input type="file" class="am-input-sm" name="photo">
                </div>
                <div class="am-u-sm-12 am-u-md-6">图片不能超过3M</div>
              </div>
              <div class="am-g am-margin-top">
                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                  酒店价格
                </div>
                <div class="am-u-sm-8 am-u-md-4">
                  <input type="text" class="am-input-sm" name="title" value="">
                </div>
                <div class="am-hide-sm-only am-u-md-6">*</div>
              </div>
              <div class="am-g am-margin-top">
                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                  酒店地址
                </div>
                <div class="am-u-sm-8 am-u-md-4">
                  <input type="text" class="am-input-sm" name="title" value="">
                </div>
                <div class="am-hide-sm-only am-u-md-6">*</div>
              </div>
              <div class="am-g am-margin-top-sm">
                <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                  酒店介绍  
                </div>
                <div class="am-u-sm-12 am-u-md-10">
                  <textarea rows="10"  name="content"></textarea>
                </div>
              </div>

          </div>



    </div>
  </div>

  <div class="am-margin">
    <button type="submit" class="am-btn am-btn-primary am-btn-xs">提交保存</button>
    <button type="button" class="am-btn am-btn-primary am-btn-xs">放弃保存</button>
  </div>
  </form>
    </div>
    <div class="am-g local-info hidden">
      <form class="am-form" action="admin/update_blog" method="post" enctype="multipart/form-data">
      <input type="hidden" name="blog_id" value="">
    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">当地人信息</strong> / <small>form</small></div>
    </div>

    <div class="am-tabs am-margin" data-am-tabs>
      <ul class="am-tabs-nav am-nav am-nav-tabs">
        <li><a href="#tab2">详细描述</a></li>
      </ul>

      <div class="am-tabs-bd">


        <div class="am-tab-panel am-fade" id="tab2">
            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                名字  
              </div>
              <div class="am-u-sm-8 am-u-md-4">
                <input type="text" class="am-input-sm" name="title" value="">
              </div>
              <div class="am-hide-sm-only am-u-md-6">*</div>
            </div>
            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                地区 
              </div>
              <div class="am-u-sm-8 am-u-md-4">
                <input type="text" class="am-input-sm" name="title" value="">
              </div>
              <div class="am-hide-sm-only am-u-md-6">*</div>
            </div>
            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                地区描述
              </div>
              <div class="am-u-sm-8 am-u-md-4">
                <input type="text" class="am-input-sm" name="title" value="">
              </div>
              <div class="am-hide-sm-only am-u-md-6">*</div>
            </div>
            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                工作年限
              </div>
              <div class="am-u-sm-8 am-u-md-4">
                <input type="text" class="am-input-sm" name="title" value="">
              </div>
              <div class="am-hide-sm-only am-u-md-6">*</div>
            </div>
            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                语言
              </div>
              <div class="am-u-sm-8 am-u-md-4">
                <input type="text" class="am-input-sm" name="title" value="">
              </div>
              <div class="am-hide-sm-only am-u-md-6">*</div>
            </div>
            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                性别
              </div>
              <div class="am-u-sm-8 am-u-md-4">
                <label for="male">男</label>
                <input type="radio" class="am-input-sm" name="gender" value="男" id="male">
                <label for="female">女</label>
                <input type="radio" class="am-input-sm" name="gender" value="女" id="female">
              </div>
              <div class="am-hide-sm-only am-u-md-6">*</div>
            </div>
            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                价格
              </div>
              <div class="am-u-sm-8 am-u-md-4">
                <input type="text" class="am-input-sm" name="title" value="">
              </div>
              <div class="am-hide-sm-only am-u-md-6">*</div>
            </div>

            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                主图
              </div>
              <div class="am-u-sm-8 am-u-md-4">
                <input type="file" class="am-input-sm" name="photo">
              </div>
              <div class="am-u-sm-12 am-u-md-6">图片不能超过3M</div>
            </div>

            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                服务描述
              </div>
              <div class="am-u-sm-12 am-u-md-10">
                <textarea rows="10" placeholder="请使用富文本编辑插件" name="content"></textarea>
              </div>
            </div>
            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                价格描述
              </div>
              <div class="am-u-sm-12 am-u-md-10">
                <textarea rows="10" placeholder="请使用富文本编辑插件" name="content"></textarea>
              </div>
            </div>
            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                订阅描述
              </div>
              <div class="am-u-sm-12 am-u-md-10">
                <textarea rows="10" placeholder="请使用富文本编辑插件" name="content"></textarea>
              </div>
            </div>
            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                商店描述
              </div>
              <div class="am-u-sm-12 am-u-md-10">
                <textarea rows="10" placeholder="请使用富文本编辑插件" name="content"></textarea>
              </div>
            </div>

        </div>



      </div>
  </div>

  <div class="am-margin">
    <button type="submit" class="am-btn am-btn-primary am-btn-xs">提交保存</button>
    <button type="button" class="am-btn am-btn-primary am-btn-xs">放弃保存</button>
  </div>
  </form>
    </div>

  </div>
  <!-- content end -->

</div>

<a href="#" class="am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}">
  <span class="am-icon-btn am-icon-th-list"></span>
</a>

<footer>
  <hr>
  <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<script type="text/template" id="tmpl-order">
    <tr>
        <td> <%= id%> </td>
        <td><%= in_time%> </td>
        <td><%= out_time%> </td>
        <td><%= book_time%> </td>
        <td><%= price%></td>
        <td>
            <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">
                    <button data-id="<%= id%>" class="am-btn am-btn-default am-btn-xs am-text-secondary btn-edit">
                        <span class="am-icon-pencil-square-o"></span> 接受
                    </button>
                    <button data-id="<%= id%>"
                            class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only btn-delete"><span
                            class="am-icon-trash-o"></span> 拒绝
                    </button>
                </div>
            </div>
        </td>
    </tr>
</script>




<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/underscore.js"></script>
<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>

<script src="assets/js/app.js"></script>


<script>
    var id = '<?php echo $admin -> admin_id;?>';
    $('#hotel-order').on('click',function(){

        $('.hotel-order').siblings().addClass('hidden');
        $('.hotel-order').removeClass('hidden');

        $.get('admin/hotelOrder',{id:id},function(res){
          $('#tbody').html('');
          for (var i = 0; i < res.length; i++) {
              var hotelOrder = res[i];
              $('#tbody').append(_.template($('#tmpl-order').html())(hotelOrder));
          }
        },'json');
    });
    $('#local-order').on('click',function(){
        $('.local-order').siblings().addClass('hidden');
        $('.local-order').removeClass('hidden');
        $.get('admin/localOrder',{id:id},function(res){
          $('#tbody-local').html('');
          for (var i = 0; i < res.length; i++) {
              var localOrder = res[i];
              $('#tbody-local').append(_.template($('#tmpl-order').html())(localOrder));
          }
        },'json');
    });
    $('#local-info').on('click',function(){
        $('.local-info').siblings().addClass('hidden');
        $('.local-info').removeClass('hidden');
    });
    $('#hotel-info').on('click',function(){
        $('.hotel-info').siblings().addClass('hidden');
        $('.hotel-info').removeClass('hidden');
    });
</script>
</body>
</html>
