<?php

include 'include/db_connect.php';
check_is_ajax('_FILE_');

if (isset($_GET['offset']) && isset($_GET['limit'])){

    $limit = $_GET['limit'];
    $offset = $_GET['offset'];


        $checkdata = DB::query("SELECT
                                        *
                                FROM
                                        travel_tbl
                                WHERE 
                                        year(date_created) = YEAR(CURDATE())
                                ORDER BY
                                        date_created DESC LIMIT {$limit} OFFSET {$offset}"
                                );
        // var_dump($checkdata);
        // exit();

                    foreach ($checkdata as $row) {

                        echo    '<div id="database">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Destination</th>
                                                <th>Purpose of Travel</th>
                                                <th>Source of Fund</th>
                                                <th>Transportation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>'.$row['name'].'</td>
                                                <td>'.$row['designation'].'</td>
                                                <td>'.$row['start_date'].'</td>
                                                <td>'.$row['end_date'].'</td>
                                                <td>'.$row['destination'].'</td>
                                                <td>'.$row['purpose'].'</td>
                                                <td>'.$row['fund'].'</td>
                                                <td>'.$row['transportation'].'</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <br>
                                    <br>
                                    ';

                        if (isset($_SESSION['admin'])) {

                        echo    '<div class="pull-left">
                                    <form action="delete_research.php" method="post" class="delete_research">
                                            <input type="hidden" value="'.intval($row['id']).'" name="delete_id">
                                                    <button type="submit" class="btn btn-danger">
                                                        Delete
                                                    </button>
                                    </form>
                                </div>
                                <div class="pull-right">
                                    <a href="edit_research.php?research_id='.intval($row['id']).'">
                                        <button type="button" class="btn btn-info">
                                            Edit Item
                                        </button>
                                    </a>
                                </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>
                                <hr>';


                        }
                    } 
                exit();

}
                                        
?>  