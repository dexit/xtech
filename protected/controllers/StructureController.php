<?php

class StructureController extends Controller
{
	/*TODO cascade update */
	/*public function actionIndex()
	{		
		$organization = new Organization('search');
		$organization->unsetAttributes();

		if(isset($_GET['Organization']))
            $organization->attributes=$_GET['Organization'];

         if(!isset($_GET['org_parentID'])) {
            $group = "A";

        	$criteria = new CDbCriteria;
 
        	$criteria->compare('id_organization', $organization->id_organization, true);

        	$dataProvider = new CActiveDataProvider('Organization', 
                array(
                    'criteria'=>$criteria,
                ));

        	if (count($dataProvider->getData()) > 0) {
                $first_model=$dataProvider->getData();
                $org_parentID = $first_model[0]->id_organization;
            }
            else {
                $org_parentID = 0;
            }

    	} else {
            $group = "B";
            $org_parentID = $_GET['org_parentID'];
        }

        $branch = new Branch("searchIncludingPermissions");
        $branch->unsetAttributes();
        $branch->scenario = 'anotherScenario';

        if(isset($_GET['Branch']))
            $branch->attributes=$_GET['Branch'];

         if($group == "A") {
            $this->render('index',array(
                'organization'=>$organization,
                'branch'=>$branch,
                'org_parentID' => $org_parentID,
            ));
        } else {
            $this->renderPartial('_branch', array(
                'branch'=>$branch,
                'org_parentID' => $org_parentID,
            ));
        }
	}*/

	public function actionIndex() 
	{
		$organization = new CActiveDataProvider('Organization');
		$branch = new CActiveDataProvider('Branch');
		$department = new CActiveDataProvider('Department');
		$cabinet = new CActiveDataProvider('Cabinet');
		$employee = new CActiveDataProvider('Employee');


		$this->render('index',array(
                'organization'=>$organization,
                'branch'=>$branch,
                'department'=>$department,
                'cabinet'=>$cabinet,
                'employee'=>$employee,
                ));
	}
}