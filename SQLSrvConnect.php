<?php

$serverName = "mssql.iproject.icasites.nl";
$connectionInfo = array( "Database"=>"iproject11",  "UID"=>"iproject11", "PWD"=>"rPgxSAaf");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if($conn)
{
    echo "Connection established.<br />";

    $tsql = "SELECT tst_Column1, tst_Column2, tst_Column3 FROM test";
    $result = sqlsrv_query( $conn, $tsql, null);

    if ( $result === false)
    {
        die( FormatErrors( sqlsrv_errors() ) );
    }

    while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
    {
        echo $row['tst_Column1'].", ".$row['tst_Column2']."<br />";
    }
    sqlsrv_free_stmt($result);
    sqlsrv_close($conn);
} else
{
    echo "Connection could not be established.<br />";
    die( print_r( sqlsrv_errors(), true));
}

?>
