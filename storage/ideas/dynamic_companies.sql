SET @sql = NULL;
SELECT
    GROUP_CONCAT(DISTINCT CONCAT(
  '
  CASE WHEN activity = "', activity, '" THEN companyName ELSE null END
  AS "', activity, '"')
)
INTO @sql
FROM companies;

SET @sql = CONCAT('SELECT ', @sql,
  ' FROM companies');
SELECT @sql;

PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
