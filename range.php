<?php
include("connect-db.php");
// Range.php
if(isset($_POST["from"], $_POST["to"],$_POST["branch"]))
{
	//$conn = mysqli_connect("localhost", "root", "", "tut");
	$rel = '';
	 $sql = "SELECT * FROM company_person WHERE start_date BETWEEN '".$_POST["from"]."' AND '".$_POST["to"]."' AND  end_date BETWEEN '".$_POST["from"]."' AND '".$_POST["to"]."' AND branch ='".$_POST["branch"]."' ";
	$result = mysqli_query($conn, $sql);
	 $i = 0;
	$rel .='
	<div class="table-responsive">
                                            <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Company Name</th>
                                                        <th>City</th>
                                                        <th>Available from</th>
                                                        <th>Available to</th>
                                                        <th>Branch</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>';
	if(mysqli_num_rows($result) > 0)
	{
		while($data = mysqli_fetch_array($result))
		{
			$i++;
			
			$rel .='
			 <tr class="content">
                                                        <td>'.$i.'</td>

                                                        <td>'.$data['company_name'].'</td>
                                                        <td>'.$data['company_city'].'</td>
                                                        <td>'.$data['start_date'].'</td>
                                                        <td>'.$data['end_date'].'</td>
                                                        <td>'.$data['branch'].'</td>

                                                        <td class="cid" style="display:none;">'.$data['c_id'].'</td>
                                                        <td><a href="#reqModal" class="btn btn-success edit editbutton" data-toggle="modal">Send Request</a></td>
                                                    </tr>';
		}
	}
	else
	{

	}
	$rel .='  </tbody></table> </div>';
	echo $rel;
}
?>