CREATE VIEW `post_kelurahan` AS
select 
kelurahan.kelurahan_id,
kelurahan.kelurahan_name,
kelurahan.kelurahan_number,
kelurahan.kecamatan_id,
count(input.tps_id) jumlah_input,
count(tps.tps_id) jumlah_tps,
sum(input.jokowi_count) as count_jokowi,
sum(input.prabowo_count) as count_prabowo

from  kelurahan 
	left join tps on tps.kelurahan_id = kelurahan.kelurahan_id 
	left join input on tps.tps_id = input.tps_id 
	
group by kelurahan.kelurahan_id;