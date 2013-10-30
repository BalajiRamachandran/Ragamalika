select field_val from bramkas_cformsdata where field_val = 'Rejected'

select a.sub_id, b.field_val
from bramkas_cformsdata a, bramkas_cformsdata b
where a.field_val = 'Rejected'
and a.sub_id = b.sub_id
and b.field_name = 'Email'

SELECT b.field_val from bramkas_cformsdata a, bramkas_cformsdata b WHERE a.field_val = 'hello' and a.sub_id = b.sub_id and b.field_name='Email'

SET @header = CONCAT('SELECT \'sub_id\', ',
    (SELECT GROUP_CONCAT(CONCAT(' \'', sub_id, '\'')) FROM bramkas_cformsdata),
    ' LIMIT 0, 0');

SET @a = -1;
SET @line1 = CONCAT(
    'SELECT \'field_name\',',
    (
        SELECT GROUP_CONCAT(
            CONCAT(' (SELECT field_name FROM bramkas_cformsdata LIMIT ',
                @a:=@a+1,
                ', 1)')
            )
        FROM bramkas_cformsdata
    ));

SET @a := -1;
SET @line2 = CONCAT(
    'SELECT \'field_val\',',
    (
        SELECT GROUP_CONCAT(
            CONCAT(' (SELECT field_val FROM bramkas_cformsdata LIMIT ',
                @a:=@a+1,
                ', 1)')
            )
        FROM bramkas_cformsdata
    ));

SET @query = CONCAT('(',
    @header,
    ') UNION (',
    @line1,
    ') UNION (',
    @line2,
    ')'
);

PREPARE my_query FROM @query;
EXECUTE my_query;

