<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Employee payslip</title>
        <?php include_once 'data-meta-css-links.php';?>
    </head>
    <body>
        <div class="container-fluid">
            <div class="col-sm-12 p-5">
                <div class="col-md-12">
                    <div class="col text-center">
                        <h2 class="pb-4 text-center font-weight-bold text-uppercase">
                            Employee payslip
                        </h2>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">First Name</label>
                            <input type="name" onkeyup="validateFirstName(this.value)" class="form-control" name="fname" id="fname" placeholder="Enter first name" required="">
                            <span class="fname-validation text-danger"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Last Name</label>
                            <input type="name" onkeyup="validateLastName(this.value)" class="form-control" name="lname" id="lname" placeholder="Enter last name" required="">
                            <span class="lname-validation text-danger"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Annual Salary</label>
                            <input type="number" class="form-control" id="annual-salary" name="annual-salary" placeholder="Enter annual salary" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Super Rate(in %)</label>
                            <input type="number" min="0" max="12" class="form-control" name="super-rate" required="" placeholder="Enter super rate">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Payment Start Date</label>
                            <input type="month" class="form-control" name="payment-start-date" required="">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary submit-button" value="Submit" name="Submit">
                    <input type="button" hidden="" class="btn btn-primary demo-button" value="Submit" name="Submit">
                </form>
            </div>
            <?php
            if(!empty($_POST) && !empty($_POST['Submit'])){
                include_once './Utilities.php';
                $utilities = new Utilities();
                $arrPost  = $_POST;
                if(!empty($arrPost['fname'])){
                    $fname = $arrPost['fname'];
                }
                if(!empty($arrPost['lname'])){
                    $lname = $arrPost['lname'];
                }
                if(!empty($arrPost['annual-salary'])){
                    $annualSalary = $arrPost['annual-salary'];
                }
                if(!empty($arrPost['super-rate'])){
                    $superRate = $arrPost['super-rate'];
                }
                if(!empty($arrPost['payment-start-date'])){
                    $paymentStartDate = $arrPost['payment-start-date'];
                }
                $paymentStartDate = $paymentStartDate.'-01';
                $payPeriod = date('d F', strtotime($paymentStartDate)).' - '.date("t F", strtotime($paymentStartDate));
                $grossIncome = round($annualSalary/12);
                $incomeTax = $utilities->calculateIncomeTax($annualSalary);
                $netIncome = round($grossIncome - $incomeTax);
                $superAmount = round($grossIncome * $superRate/100);
            ?>
                <div class="col-md-12">
                    <h2 class="text-center font-weight-bold text-uppercase">Input</h2>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Annual Salary</th>
                                <th>Super Rate(in %)</th>
                                <th>Payment Start Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?=$fname?></td>
                                <td><?=$lname?></td>
                                <td><?=$annualSalary?></td>
                                <td><?=$superRate."%"?></td>
                                <td><?=$payPeriod?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            
                <div class="col-md-12">
                    <h2 class="text-center font-weight-bold text-uppercase">Output</h2>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Pay Period</th>
                                <th>Gross Income</th>
                                <th>Income Tax</th>
                                <th>Net Income</th>
                                <th>Super Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?=$fname.' '.$lname?></td>
                                <td><?=$payPeriod?></td>
                                <td><?=$grossIncome?></td>
                                <td><?=$incomeTax?></td>
                                <td><?=$netIncome?></td>
                                <td><?=$superAmount?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php
            }
            ?>
        </div>
        <?php include_once './data-javascript.php';?>
    </body>
</html>
