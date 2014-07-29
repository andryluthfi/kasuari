CREATE VIEW `post_kelurahan` AS
select 
kelurahan.kelurahan_id,
kelurahan.kelurahan_name,
kelurahan.kelurahan_number,
kelurahan.kecamatan_id,
sum(tps.entries_count) jumlah_input,
count(tps.tps_id) jumlah_tps,
sum(tps.jokowi_count) as count_jokowi,
sum(tps.prabowo_count) as count_prabowo

from  kelurahan 
	left join tps on tps.kelurahan_id = kelurahan.kelurahan_id 

group by kelurahan.kelurahan_id;