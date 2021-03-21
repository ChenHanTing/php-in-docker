### 啟用與卸載

- 啟用：

  ````sh
  rm -f tmp/pids/server.pid && docker-compose up
  ````

- 卸載：

  ````sh
  docker-compose down
  ````

- Example:

  ````json
  [
    {id: 1, key: key1, val: val1},
    {id: 1, key: key2, val: val2},
    {id: 1, key: key3, val: val3},
  ]

    0      1     2
  [key1, key2, key3],
  [val1, val2, val3]
    0      1     2

 [
    {
      name: 'Aragorn',
      race: 'Human',
    },
    {
      name: 'Legolas',
      race: 'Elf',
    },
    {
      name: 'Gimli',
      race: 'Dwarf',
    },
  ]
````

````php
foreach ($characters as $character) {
	echo $character->name . '<br>';
}

Aragorn, Legolas, Gimli
````

