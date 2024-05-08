with recursive dates as (
    select date('2001-01-01') as day
union all
select day + interval 1 day
from dates
where day < now()
    )
select d.day, c.companyName
from dates d left join
     companies c
     on d.day = c.companyFoundationDate
group by d.day;
