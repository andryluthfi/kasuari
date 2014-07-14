CREATE VIEW `post_tps` AS
select 
tps.tps_id,
tps.tps_number,
tps.kelurahan_id,
count(input.tps_id) jumlah_input,
count(tps.tps_id) jumlah_tps,
sum(input.jokowi_count) as count_jokowi,
sum(input.prabowo_count) as count_prabowo

from  tps  
	left join input on tps.tps_id = input.tps_id 
	
group by tps.tps_id;
