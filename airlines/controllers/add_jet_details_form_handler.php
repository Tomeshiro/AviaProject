<?php
require_once ("../models/jet.php");
			if(isset($_POST['Submit']))
			{
				$data_missing=array();
				if(empty($_POST['jet_id']))
				{
					$data_missing[]='Jet ID';
				}
				else
				{
					$jet_id=trim($_POST['jet_id']);
				}

				if(empty($_POST['jet_type']))
				{
					$data_missing[]='Jet Type';
				}
				else
				{
					$jet_type=$_POST['jet_type'];
				}

				if(empty($_POST['jet_capacity']))
				{
					$data_missing[]='Jet Capacity';
				}
				else
				{
					$jet_capacity=$_POST['jet_capacity'];
				}

				if(empty($data_missing))
				{
                    $jet = getJet($jet_id);
                    if ($jet != false){
                        header("location: ../views/add_jet_details.php?msg=failed");
                    } else {
                        $data = array(
                            'jet_id' => $jet_id,
                            'jet_type' => $jet_type,
                            'total_capacity' => $jet_capacity,
                            'active' => 'Yes'
                        );
                        createJet($data);
						header("location: ../views/add_jet_details.php?msg=success");
                    }
				}
				else
				{
					echo "The following data fields were empty! <br>";
					foreach($data_missing as $missing)
					{
						echo $missing ."<br>";
					}
				}
			}
			else
			{
				echo "Submit request not received";
			}
            ?>