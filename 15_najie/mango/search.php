<?php
/*  search.php
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
  
  <table summary="search form" class="datatable" width="60%">
      <caption><?php echo $txt['search1'] ?></caption>
	  <tr>
	    <td>
	      <form method="post" action="index.php?page=browse">
	       <?php echo $txt['search2'] ?>
	       <input type="text" name="searchfor" size="40">
	       <br />
	       <?php echo $txt['search3'] ?><br />
	                <SELECT NAME="searchmethod">
	                <OPTION VALUE=" AND " SELECTED><?php echo $txt['search4'] ?>
	                <OPTION VALUE=" OR "><?php echo $txt['search5'] ?>
	                </SELECT>
	                <br />
	                <br />
	       <div style="text-align:center;"><input type="submit" value="<?php echo $txt['search6'] ?>"></div>
	      </form>
	    </td>  
	  </tr>    
  </table>      