INSERT INTO public.cat__vulnerabilidad(
	id, nombre)
	VALUES (1, 'Fisica'),(2, 'De las comunicaciones'), (3, 'Software');

INSERT INTO public.vulnerabilidad(
	id, categoria_id, nombre)
	VALUES (1, 3, 'Falta de mantenimiento'),(2, 1, 'Falta de sistema anti-incendio'),(3, 3, 'Firewall desactivado'),(4, 1, 'Hardware obsoleto');

