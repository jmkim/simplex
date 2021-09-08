# Simplex

Works well on [PHP](http://php.net/) with [any](http://www.apache.org/) [web](http://nginx.org/) [servers](http://www.lighttpd.net/).
Try [Simplex Demo](https://jmkim.github.io/simplex/demo/).

## How to install
```
Just put index.php in your sharing folder.
```
```bash
$ cd directory_you_wanna_share/

# clone Simplex git to your sharing directory
$ git clone git@github.com:jmkim/simplex.git

# move index.php to the parent directory
$ cd simplex/
$ mv index.php ../
$ cd ../

# remove Simplex git from your sharing directory
$ rm -rf .htaccess
$ rm -rf simplex
```

## [Demo Site](https://jmkim.github.io/simplex/demo/)

## Credits

 - Based on [Encode Explorer 6.4.1](https://github.com/marekrei/encode-explorer/tree/6.3) by [Marek Rei](http://www.marekrei.com).
 - [Faenza Icons](http://tiheum.deviantart.com/art/Faenza-Icons-173323228) are used in Simplex.

## License

```
	This is free software and it's distributed under GNU/GPL Licence.

	Encode Explorer is written in the hopes that it can be useful to people,
	and Simplex is following it respectfully.
	It has NO WARRANTY and when you use it, the author is not responsible
	for how it works (or doesn't).

	Faenza Icons (http://tiheum.deviantart.com/art/Faenza-Icons-173323228)
	are used which is distributed under the GNU/GPL License.
```
