> **Command to observe troubleshoot**

```shell
ping -c 4 8.8.8.8

output:

PING 8.8.8.8 (8.8.8.8) 56(84) bytes of data.
64 bytes from 8.8.8.8: icmp_seq=1 ttl=58 time=1.68 ms
64 bytes from 8.8.8.8: icmp_seq=2 ttl=58 time=1.70 ms
64 bytes from 8.8.8.8: icmp_seq=3 ttl=58 time=1.71 ms
64 bytes from 8.8.8.8: icmp_seq=4 ttl=58 time=1.69 ms

--- 8.8.8.8 ping statistics ---
4 packets transmitted, 4 received, 0% packet loss, time 3005ms
rtt min/avg/max/mdev = 1.686/1.699/1.718/0.051 ms


sudo ifdown <interface name>
sudo ifup <interface name>

ping google.com
sudo service networking restart
ping 8.8.8.8

sudo service networking restart

Find out where the connection fails

mtr 8.8.8.8

traceroute -4 8.8.8.8

```

## How To Check CPU Usage from Linux Command Line

```
top
top –i
man top
and kill the process using processid
```



**reduce** **server** **load**

```shell
can use renice -p <PID> <PRIORITY> and ionice -c <CLASS> -p <PID> to change their priorities
```





CREATE VIEW FOR MY ROUTER DETAILS :

```mysql
create view router_detail_view as SELECT * FROM router_details;
```



N number of record to insert 

```mysql
insert into router_details (sap_id, host_name, ip_address, loopback, mac_address, is_deleted, created, modified) values (
                                                                                                                         dynamic value can use here time not enough so giving concept
                                                                                                                        ) where sap_id not in (select sap_id from router_details) or mac_address not in (select mac_address from router_details)
```





Note : some answers are in wiproTest  Folder which is executable