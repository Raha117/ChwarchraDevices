<?php $__env->startSection('content'); ?>
    <h3 style="color:#892F5C"> About this website  </h3>
    <p style="font-size:15px"> This website was mainly created as a database for all the devices and employees in <b style="color:#892F5C"> New Chwarchra </b> offices . Our plan was to make every single record as much detailed as possible so that it is beneficial for long-term usage .   </p> 
    <h3 style="color:#892F5C"> Employees</h3>
    <p style="font-size:15px"> This section is meant for <b style="color:#892F5C">employees</b> records such as name, position, phone number and etc. . </p>
    <p style="font-size:15px" class="text text-warning" > note: make sure that the <b style="color:#892F5C">name </b>, <b style="color:#892F5C">organization</b> , and  <b style="color:#892F5C">location</b> columns are detailed enough , for example provide at least first and last name to <b style="color:#892F5C">name</b> column  </p>
    <ol>
        <li><p style="font-size:15px"> You can add new employees any time by filling out the inputs as shown and clicking <b class="text text-info">New Employee</b> </p></li>
        <li> <p style="font-size:15px"> You can <b class="text text-danger"> delete </b> or <b class="text text-success"> update </b> employees data at any time </p></li>
        <li> <p style="font-size:15px"> You can <b class="text text-info"> add </b> or <b class="text text-danger">delete</b> new devices to employees at any time, to do so click on the blue colored <b class="text text-info">name</b> in employees field then click on <b class="text text-info">Add new device to employee </b> or <b class="text text-danger">delete</b> devices that belong to an employees by clicking the <b class="text text-danger">delete</b> button .</p> </li>
        <li style="font-size:15px"> An employee can have multiple devices , but a device cannot belong to multiple users, so if you map a device to an employee, that device does not show up in <b class="text text-info"> Add new Device to employee  </b> . This feature is very useful for long-term usage since you do not want to have duplicates and multiple instances of a device added to one employee or even other employees . </li>
        <li style="font-size:15px"><p> If a device does not exist in the website, you will not be able to see it in <b class="text text-info"> Add new device to employee </b> field . </p></li>
        <li style="font-size:15px"><p>If you <b class="text text-danger">delete</b> a device , make sure it does not belong to anyone because that relationship will get <b class="text text-danger">deleted </b> as well . </li>

    </ol>
    <h3 style="color:#892F5C"> Computers </h3>
    <p style="font-size:15px"> This section is for the computers data and only allows Desktop and Laptop, <b class="text text-warning"> other devices like tablets and phones can be inserted into <b style="color:#892F5C"> Other Devices </b> section</b> .</p>
    <ol>
        <li style="font-size:15px"> <p> Make sure to give a detailed description to the <b style="color:#892F5C">brand</b> , <b style="color:#892F5C">Organization</b>, and <b style="color:#892F5C">Location</b> columns , for example if we have two computers that are both HP brand, DO NOT name both of them HP unless they are identical, instead provide more detailed description such as HP Lenovo or HP Pavilion, therefore make sure to give a unique description if two computers are from the same brand but they are from different versions or collections .</p>
        <li style="font-size:15px"> <p> Make sure to add <b style="color:#892F5C">memory</b> and <b style="color:#892F5C">storage</b> units, for example instead of 16 or 256 use 16GB, 256GB and so on . </p>  </li>
    </ol>
    <h3 style="color:#892F5C"> Network Devices</h3>
    <p style="font-size:15px"> This section is meant for <b style="color:#892F5C">Network Devices</b> records such as Routers, Switches, Access Points, Hubs, Firewalls , and etc. . </p>
    <p class="text text-warning" style="font-size:15px"> just like <b style="color:#892F5C">Computers</b> section make sure the <b style="color:#892F5C">brand</b>, <b style="color:#892F5C"> organization </b>, and <b style="color:#892F5C">location </b> columns are detailed . </p>
    <h3 style="color:#892F5C"> Printers </h3>
    <p style="font-size:15px">This section is meant for <b style="color:#892F5C">printers</b> records just like other section make sure to be detailed about <b style="color:#892F5C">brand</b> , <b style="color:#892F5C">organization</b> , <b style="color:#892F5C"> location </b> columns </p>
    <h3 style="color:#892F5C">Cameras</h3>
    <p style="font-size:15px"> This section is meant for CCTV cameras records . Please  <b class="text text-warning">note that while you add personal cameras and other devices that are not CCTV here, but it is a good practice to put those kind of devices in </b> <b style="color:#892F5C"> Other Devices </b> section .  </p>
    <h3 style="color:#892F5C">Other Devices</h3>
    <p style="font-size:15px"> This section is meant for the devices that do not fit into a category such as keyboard, mouse, UPS, phones, simcards, and etc. . </p>
    <h3 style="color:#892F5C">Accounts</h3>
    <p style="font-size:15px"> You can define which accounts are allowed to access this website through this section if an account is shown in this field then it is allowed to access this website <b class="text text-warning">note that passwords are not shown for security purposes. You can still make any changes you want like <b class="text text-success">update</b> or <b class="text text-danger">delete</b> or <b class="text text-info"> create new login accounts </b> </p>
    
    <h3 style="color:#892F5C"> Statistics</h3>
    <p style="font-size:15px"> This section shows the total number of <b style="color:#892F5C">employees</b> , <b style="color:#892F5C">computers</b> , <b style="color:#892F5C">network devices</b> , <b style="color:#892F5C">cameras</b> , <b style="color:#892F5C">other devices</b> that exist in this website</p>
    <h3 style="color:#892F5C">Be Aware of </h3>
    <ol>
        <li> <p class="text text-warning" style="font-size:15px"> Active columns in every section indicates usage or availability, for example if an employee is not working now but might work in future you can set his/her active field to <b style="color:#892F5C">No</b> until he/she comes back . Same is true for the devices , for example if a printer is not in use you can set <b style="color:#892F5C"> Active </b> to <b style="color:#892F5C">No</b> </p> </li>
        <li> <p class="text text-warning" style="font-size:15px"> every section has <b style="color:#892F5C"> Created At </b> and <b style="color:#892F5C"> Updated At </b> which are set to Iraq/Baghdad timezone.<b style="color:#892F5C"> Created At </b> column shows the time and date when a single row or record was created, and <b style="color:#892F5C">Updated At</b> shows the time and date a row was updated , for example in <b style="color:#892F5C">employees </b> section if you fill out all the required inputs and hit <b class="text text-info"> New Employee </b> both <b style="color:#892F5C">Created At</b> and <b style="color:#892F5C">Updated At</b> fields will be set to the time you created the row, but if you update the row by clicking the <b class="text text-success">update</b> button later in future, the <b style="color:#892F5C"> Updated At</b> field will be set to the date and time you made the changes . </p></li>
    </ol>
    <h5 class="text text-danger"> Warning : This website was created by <b class="text text-info">Meta Solutions</b> , If you have access to source codes or backend database of this website plase DO NOT make any changes without reaching out to <b class="text text-info"> Meta solutions </b>. Any small changes can cause the website to be broken. Thank you for understanding . </h5>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raha/projects/ChwarchraProject/resources/views/welcome.blade.php ENDPATH**/ ?>