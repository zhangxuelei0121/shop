<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP管理中心 - 添加新商品 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="goods.php?act=list">商品列表</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP管理中心</a> </span><span id="search_id" class="action-span1"> - 添加新商品 </span>
<div style="clear:both"></div>
</h1>

<script type="text/javascript">
//此函数用来切换选项卡
//参数 item 代表的当前点击的 span 的标识 例如 general
function changeTab(item) {
    //根据当前 item的 值，将对应的table显示 或者 隐藏
    //定义可能性数组
    var items_arr = ['general', 'detail', 'mix', 'gallery'];
    //遍历
    for(var i=0; i<items_arr.length; i++){
        //判断
        if(items_arr[i] == item) {
            //找到当的，将对应的table显示
            //通过拼凑table 的id 属性 的值 找到当前的 table
            document.getElementById(items_arr[i] + '-table').style.display = 'table';
            //找到当前的 span  更改其 class 使用 className代表 class属性
            document.getElementById(items_arr[i] + '-tab').className = 'tab-front';
        } else {
            //不是当前的
            document.getElementById(items_arr[i] + '-table').style.display = 'none';
            document.getElementById(items_arr[i] + '-tab').className = 'tab-back';

        }
    }
}
</script>

<!-- start goods form -->
<div class="tab-div">
    <!-- tab bar -->
    <div id="tabbar-div">
      <p>
        <span class="tab-front" id="general-tab" onclick="changeTab('general')">通用信息</span>
        <span class="tab-back" id="detail-tab" onclick="changeTab('detail')">详细描述</span>
        <span class="tab-back" id="mix-tab" onclick="changeTab('mix')">其他信息</span>
        <span class="tab-back" id="gallery-tab" onclick="changeTab('gallery')">商品相册</span>
      </p>
    </div>

    <!-- tab body -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" action="" method="post" name="theForm" >

        <!-- 通用信息内容 -->
        <table width="90%" id="general-table" align="center">
          <tr>
            <td class="label">商品名称：</td>
            <td><input type="text" name="goods_name" value="" style="float:left;color:;" size="30" />
            <span class="require-field">*</span></td>
          </tr>
          <tr>
            <td class="label"> 商品货号： </td>
            <td><input type="text" name="goods_sn" value="" size="20" /><span id="goods_sn_notice"></span><br />
            <span class="notice-span" style="display:block"  id="noticeGoodsSN">如果您不输入商品货号，系统将自动生成一个唯一的货号。</span></td>
          </tr>
          <tr>
            <td class="label">商品分类：</td>
            <td><select name="category_id">
            <option value="0">请选择...</option>
            <!-- 遍历显示所有的分类 -->
            <?php foreach($category_list as $item):?>
                <option value="<?php echo $item['category_id'];?>" ><?php echo str_repeat("&nbsp;&nbsp;", $item['level']);?><?php echo $item['category_name'];?></option>
            <?php endforeach;?>
            </select>
                              <span class="require-field">*</span>            </td>
          </tr>


         <tr>
            <td class="label">本店售价：</td>
            <td><input type="text" name="goods_price" value="0" size="20" onblur="priceSetted()"/>
            <span class="require-field">*</span></td>
          </tr>

          <tr>
            <td class="label"><label for="is_special">
            <input type="checkbox" value="1" name="is_special" id="is_promote"> 特价价格：</label></td>
            <td id="promote_3">
            <input type="text" size="20" value="0" name="special_price" id="promote_1"></td>
          </tr>

          <tr>
            <td class="label">上传商品图片：</td>
            <td>
              <input type="file" name="goods_img" size="35" />
            </td>
          </tr>

        </table>
        <!-- 商品通用信息内容结束 -->

        <!-- 商品描述 -->
        <table width="90%" id="detail-table" style="display:none">
          <tr>
            <td>
            <?php echo $fck_html;?>

            </td>
          </tr>
        </table>


        <!-- 商品的其他信息 -->
        <table width="90%" id="mix-table" style="display:none" align="center">

            <tr>
            <td class="label">商品库存数量：</td>
            <td><input type="text" name="goods_number" value="1" size="20" /><br />
            <span class="notice-span" style="display:block"  id="noticeStorage">库存在商品为虚货或商品存在货品时为不可编辑状态，库存数值取决于其虚货数量或货品数量</span></td>
          </tr>

          <tr>
            <td class="label">加入推荐：</td>
            <td>
                <input type="checkbox" name="is_promote" value="1"  />促销
                <input type="checkbox" name="is_best" value="1"  />精品
                <input type="checkbox" name="is_new" value="1"  />新品
                <input type="checkbox" name="is_hot" value="1"  />热销
            </td>
          </tr>

          <tr id="alone_sale_1">
            <td class="label" id="alone_sale_2">上架：</td>
            <td id="alone_sale_3"><input type="checkbox" name="is_on_sale" value="1" checked="checked" /> 打勾表示允许销售，否则不允许销售。</td>
          </tr>

           <tr>
            <td class="label">商品排序：</td>
            <td><input type="text" name="sort_order" value="50" size="20" />
            </td>
          </tr>

        </table>

        <!-- 商品相册 -->
        <table width="90%" id="gallery-table" style="display:none" align="center">

          <tr>
            <td>
                          </td>
          </tr>
          <tr><td>&nbsp;</td></tr>

          <tr>
            <td>
              <a href="javascript:;" onclick="addImg()">[+]</a>
              图片描述 <input type="text" name="img_desc[]" size="20" />
              上传文件 <input type="file" name="img_url[]" />

            </td>
          </tr>
        </table>

        <script type="text/javascript">
        function addImg() {
            //先找到需要插入行的 表格
            //
            var gallery_table = document.getElementById('gallery-table');
//            alert(gallery_table);
            //在 table 对象中 插入一行
            //insertRow(插入位置),其中这个插入位置，如果为0 的话 相当于在table的开始插入一行，如果为当前的行数，相当于在table的最后插入一行。范围就是0  到 表格的行数。
            //此方法的返回值为当前插入的tr对象。
            //我们认为在表格的最后插入
            var gallery_tr = gallery_table.insertRow(3);
            //在当前的行内在 插入 td
            //insertCell(插入位置）函数的返回值为当前插入的td对象
            var gallery_td = gallery_tr.insertCell(0);
            //最后在当前的td中增加需要的内容即可
            //通过 innerHTML属性修改即可
            gallery_td.innerHTML = '<a href="javascript:;" onclick="removeImg(this)">[-]</a>图片描述 <input type="text" name="img_desc[]" size="20" />上传文件 <input type="file" name="img_url[]" />';

        }
        /**
         *删除某个tr，我们需要判断出来 当前需要删除那个tr。
         *我们要删除的是 包含当前 - 的tr
         *参数为 当前所点击的 链接对象
         */
        function removeImg(obj) {
            //获得当前的table
            var gallery_table = document.getElementById('gallery-table');
            //获得当前tr的位置,先获得当前的tr,需要先找到点击 连接 a。
            var gallery_tr = obj.parentNode.parentNode;
            var tr_index = gallery_tr.rowIndex;

            //删除
            gallery_table.deleteRow(tr_index);

        }
        </script>


        <div class="button-div">

          <input type="submit" value=" 确定 " class="button" />
          <input type="reset" value=" 重置 " class="button" />
        </div>
        <input type="hidden" name="act" value="insert" />
      </form>
    </div>
</div>
<!-- end goods form -->

<div id="footer">
版权所有 &copy; 2013 青岛大学浩园4号楼411室</div>
</div>

</body>
</html>