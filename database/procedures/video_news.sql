CREATE
OR REPLACE VIEW videos_news
AS
SELECT title,
       guest,
       date_line,
       c_id,
       np.image,
       r.name AS reporter_name,
       c.name AS category_name,
       c.slug AS category_slug
FROM np_news np
         JOIN categories c ON c.id = np.category_id and c.is_video = 1
         JOIN reporters r ON np.reporter_id = r.id
where np.deleted_at is null
  and np.status = 'active'
ORDER BY publish_date DESC LIMIT 5;
