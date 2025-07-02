CREATE TABLE posts (
    id int(11) NOT NULL AUTO_INCREMENT,
    title varchar(256) NOT NULL,
    content text NOT NULL,
    created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO posts (title, content) VALUES
('First post', 'This is a really intersting post.'),
('Second post', 'This is a really intersting post.'),
('Third post', 'This is a really intersting post.');
