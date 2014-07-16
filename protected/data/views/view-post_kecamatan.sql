CREATE VIEW `post_kecamatan` AS
select 
kecamatan.kecamatan_id,
kecamatan.kecamatan_name,
kecamatan.kecamatan_number,
kecamatan.kota_id,
count(input.tps_id) jumlah_input,
count(tps.tps_id) jumlah_tps,
sum(input.jokowi_count) as count_jokowi,
sum(input.prabowo_count) as count_prabowo

from kecamatan	
	left join kelurahan on kelurahan.kecamatan_id = kecamatan.kecamatan_id
	left join tps on tps.kelurahan_id = kelurahan.kelurahan_id 
	left join input on tps.tps_id = input.tps_id 
	
group by kecamatan.kecamatan_id;
