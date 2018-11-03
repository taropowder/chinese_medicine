<script src="assets/js/jquery-1.10.2.js"></script>

<!-- Bootstrap Js -->
<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/materialize/js/materialize.min.js"></script>

<!-- Metis Menu Js -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- Morris Chart Js -->
<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="assets/js/morris/morris.js"></script>


<script src="assets/js/easypiechart.js"></script>
<script src="assets/js/easypiechart-data.js"></script>

<script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
<!-- Custom Js -->
<script src="assets/js/custom-scripts.js"></script>


</body>
<script>
//    document.getElementById("but").onclick=
        function change (type,id) {
        var name = window.prompt("输入修改内容",name);

        if(name)  //当用户输入内容，点确定后；

        {

            var xhr=new XMLHttpRequest();
//            var url ="index.php"
            var url = 'table.php?change='+id+'&type='+type+'&name='+name;
            xhr.open('get',url);
            xhr.onload=function () {
//                alert(xhr.responseText);
                alert('修改成功');
                location.reload();
            }
            xhr.send();


        }
    }
function   isDigit(s)
{
    var   patrn=/^[0-9]{1,20}$/;
    if   (!patrn.test(s))   return   false;
    return   true;
}
function check(id,con)
{
    var bb = document.getElementById(id);
    if(isDigit(bb.value))
    {

    }
    else
    {

        c=bb.value.indexOf(".");
        if (c<0){
            alert(con+"请确认是否为数字");
        }

    }
}

</script>
</html>
