CREATE VIEW `result` AS
select 
    sum(prabowo_count) as count_prabowo,
    sum(jokowi_count) as count_jokowi,
    sum(prabowo_count) / (sum(prabowo_count) + sum(jokowi_count)) as percentage_prabowo,
    sum(jokowi_count) / (sum(prabowo_count) + sum(jokowi_count)) as percentage_jokowi
from input
