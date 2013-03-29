<!-- $Id: category_list.htm 17019 2010-01-29 10:10:34Z liuhui $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP管理中心 - 商品分类 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />

</head>
<body>

<h1>
<span class="action-span"><a href="category.php?act=add">添加分类</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP管理中心</a> </span><span id="search_id" class="action-span1"> - 商品分类 </span>
<div style="clear:both"></div>
</h1>

<form method="post" action="" name="listForm">

<div class="list-div" id="listDiv">

<table width="100%" cellspacing="1" cellpadding="2" id="list-table">
  <tr>
    <th>分类名称</th>
    <th>商品数量</th>
    <th>排序</th>
    <th>操作</th>
  </tr>

<?php foreach($list as $row) { ?>
  <tr align="center" class="0" id="0_6">
    <td align="left" class="first-cell" >
    	<?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $row['level'])?>
    	<?php echo $row['category_name'];?>
    </td>
    <td width="10%">商品数量</td>
    <td width="10%" align="right"><?php echo $row['sort_order'];?></td>
    <td width="24%" align="center">
      <a href="category.php?act=edit&id=<?php echo $row['category_id'];?>">编辑</a> |
      <a href="category.php?act=del&id=<?php echo $row['category_id'];?>" onclick="return confirm('你确定删除 <?php echo $row['category_name'];?> 么?');" title="移除">移除</a>
    </td>
  </tr>
<?php } ?>
  </table>
</div>
</form>


<div id="footer">

版权所有 &copy; 2013 青岛大学浩园4号楼411室</div>

</div>

</body>
</html>