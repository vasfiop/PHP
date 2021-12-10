<?php
/*  my.php
    Copyright 2006 Elmar Wenners
    Support site: http://www.chaozz.nl

    This file is part of FreeWebshop.org.

    FreeWebshop.org is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    FreeWebshop.org is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with FreeWebshop.org; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/
?>
<?php if ($index_refer <> 1) { exit(include("includes/exit.inc.php")); } ?>
<?php include ("checklogin.php"); ?>

<?php
    PutWindow($txt['my3'], $txt['my4'], "personal.jpg", "80");
?>
     <br />
     <br />     
     <table width="80%" class="datatable">
      <caption><?php echo $txt['my5']; ?></caption>
      <tr><td>

           <table width="100%" class="borderless"><tr>
             <td><div style="text-align:center;"><img src="<?php echo $gfx_dir ?>/key.gif" alt="" /><br /><?php echo $txt['my6'] ?>: <?php echo $customerid ?></div></td>
             <td><div style="text-align:center;"><a class="plain" href="index.php?page=customer&action=show"><img src="<?php echo $gfx_dir ?>/customers.gif" alt="" /><br /><?php echo $txt['my7'] ?></a></div></td>
             <td><div style="text-align:center;"><a class="plain" href="index.php?page=orders&id=<?php echo $customerid; ?>"><img src="<?php echo $gfx_dir; ?>/orders.gif" alt="" /><br /><?php echo $txt['my8'] ?></a></div></td>
	     <td><div style="text-align:center;"><a class="plain" href="index.php?page=cart&action=show"><img src="<?php echo $gfx_dir; ?>/carticon.gif" alt="" /><br /><?php echo $txt['my9'] ?></a></div></td>
           </tr></table>
          </td> 
      </tr>
     </table>
