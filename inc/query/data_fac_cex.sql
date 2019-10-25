declare @FAC int
set @FAC=193448
select
c.factura as FACTURA,
CONVERT(varchar,f.fecha_prec,103) as FECHA_FAC,
CONVERT(varchar,f.fecha_venc,103) as FECHA_VEN,
f.hora as HORA,
ltrim(rtrim(f.nombre)) as EPS,
ltrim(rtrim(f.codigo)) as NIT,
ltrim(rtrim(c.cod_admin)) as COD,
ltrim(rtrim(f.direccion)) as DIR,
ltrim(rtrim(f.telefono)) as TEL,
CONCAT(c.historia,' ',c.año) as ADMISION,
CONCAT(ltrim(rtrim(p.ppellido)),' ',ltrim(rtrim(p.sapellido)),' ',ltrim(rtrim(p.nombre)),' ',ltrim(rtrim(p.snombre))) as PACIENTE,
CONCAT(ltrim(rtrim(p.tipo_c)),' - ',ltrim(rtrim(p.codigo))) as IDENTIFICACION,
convert(varchar,fecha_nac,103) as F_NAC,
ltrim(rtrim(p.telefono)) as P_TEL,
ltrim(rtrim(p.direccion)) as P_DIR,
ltrim(rtrim(d.nommun)) as MUNIC,
ltrim(rtrim(c.nro_aut)) as AUT,
ltrim(rtrim(m.nombre)) as MEDICO,
convert(varchar,c.fecha,103) as F_ING,
(
 CASE p.tipo_usuario
 WHEN 1 THEN 'Contributivo'
 WHEN 2 THEN 'Subsidiado'
 END
) as REG,
convert(int,f.vlr_fact ) as SUBT,
convert(int,f.coopago) as COP
from consulta01 c
inner join factura01 f on c.factura=f.numero
inner join paciente p on c.codigo=p.codigo
inner join medicos01 m on c.medico=m.codigo
inner join departamentos d on concat(p.cod_depart,p.cod_mun)=CONCAT(d.codigo,d.codmun)
where c.factura=@FAC
