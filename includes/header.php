<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Core PHP Crud functions By PHP Code Builder</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script type="text/javascript">
        function edt_id(id) {
            window.location.href = 'edit_artist.php?edit_id=' + id;
        }
        function view_id(id) {
            window.location.href = 'view_artist.php?view_id=' + id;
        }
        function delete_id(id) {
            if (confirm('Sure to Delete ?')) {
                window.location.href = 'indexartist.php?delete_id=' + id;
            }
        }
        function changestatus_id(id, status) {
            window.location.href = 'indexartist.php?changestatus_id=' + id + '&status=' + status;
        }
    </script>
</head>
<body>