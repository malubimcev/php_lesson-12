<?php
    function get_empty_recordset()
    {
        $recordset = [
            [
              'name' => '-',
              'author' => '-',
              'year' => '-',
              'genre' => '-',
              'isbn' => '-',
            ]
        ];
        return $recordset;
    }

    function get_data_from_db(&$params)
    {
        $user = 'lubimcev';
        $password = 'neto1721';
        $host = 'localhost';
        $dbname = 'lubimcev';
        $result = [];
        $param_strings = [];
        $where_string = '';
        $request = "SELECT * FROM books";
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                if (!empty($v)) {
                    $param_strings[] = "($k LIKE '$v')";
                }

            }
            $where_string = implode(' AND ', $param_strings);
            if (strlen($where_string) > 0) {
                $request .= " WHERE " . $where_string;
            }
        }
        $request .= " ORDER BY name ASC";
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $result = $pdo->query($request);
            $pdo = null;
        } catch (Exception $error) {
            echo $error->getMessage();
        }
        if (empty($result)) {
            $result = get_empty_recordset();
        }
        return $result;
    }
