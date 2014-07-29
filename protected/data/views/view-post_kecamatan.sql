CREATE VIEW `post_kecamatan` AS
select 
kecamatan.kecamatan_id,
kecamatan.kecamatan_name,
kecamatan.kecamatan_number,
kecamatan.kota_id,
sum(tps.entries_count) jumlah_input,
count(tps.tps_id) jumlah_tps,
sum(tps.jokowi_count) as count_jokowi,
sum(tps.prabowo_count) as count_prabowo

from kecamatan	
	left join kelurahan on kelurahan.kecamatan_id = kecamatan.kecamatan_id
	left join tps on tps.kelurahan_id = kelurahan.kelurahan_id 
	
group by kecamatan.kecamatan_id;
