CREATE VIEW `post_tps` AS
select 
tps.tps_id,
tps.tps_number,
tps.kelurahan_id,
sum(tps.entries_count) jumlah_input,
count(tps.tps_id) jumlah_tps,
sum(tps.jokowi_count) as count_jokowi,
sum(tps.prabowo_count) as count_prabowo

from  tps  
group by tps.tps_id;
