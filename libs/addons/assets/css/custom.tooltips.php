<style>
:root {
  --color_infos : rgba(0,0,0,.07);
  --color_links : #2271b1;
}
.infos {
  display: inline-block;
}
.infos-point {
  display: inline-block;
  cursor: pointer;
  background: transparent;
  color: var(--color_infos);
  position: relative;
  left: 4px;
}
.infos-content {
  display: inline-block;
  font-style: italic;
  margin-left: 1em;
  opacity: 0;
  transform: scale(0);
}
@keyframes in {
  from {
    opacity: 0;
    transform: scale(0);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}
.infos:hover .infos-content {
  animation: in 1s ease-in forwards;
}
.responsive-table {
	width: 100%;
	margin-bottom: 1.5em;
}

.responsive-table a {
	text-decoration: none !important;
}

.responsive-table thead {
	position: absolute;
	clip: rect(1px 1px 1px 1px);
	clip: rect(1px, 1px, 1px, 1px);
	padding: 0;
	border: 0;
	height: 1px;
	width: 1px;
	overflow: hidden;
}

.responsive-table thead th {
	background-color: #000;
	border: 1px solid #000;
	font-weight: normal;
	text-align: center;
	color: white;
}

.responsive-table thead th:first-of-type {
	text-align: left;
}

.responsive-table tbody, .responsive-table tr, .responsive-table th, .responsive-table td {
	display: block;
	padding: 0;
	text-align: left;
	white-space: normal;
}

.responsive-table th, .responsive-table td {
	padding: .5em;
	vertical-align: middle;
}

.responsive-table caption {
	margin-bottom: 1em;
	font-size: 1em;
	font-weight: bold;
	text-align: center;
}

.responsive-table tfoot {
	font-size: .8em;
	font-style: italic;
}

.responsive-table tbody tr {
	margin-bottom: 1em;
	border: 2px solid rgba(238,238,238, 0.4);
}

.responsive-table tbody tr:last-of-type {
	margin-bottom: 0;
}

.responsive-table tbody th[scope="row"] {
	background-color: #2271b1;
	color: white;
}

.responsive-table a {
	color: white;
}

.responsive-table tbody td[data-type=currency] {
	text-align: right;
}

.responsive-table tbody td[data-title]:before {
	content: attr(data-title);
	float: left;
	font-size: .8em;
	color: rgba(238,238,238, 0.4);
}

.responsive-table tbody td {
	text-align: right;
	border-bottom: 1px solid rgba(238,238,238, 0.4);
}

@media (min-width: 52em) {
	.responsive-table {
		font-size: .9em;
	}

	.responsive-table thead {
		position: relative;
		clip: auto;
		height: auto;
		width: auto;
		overflow: auto;
	}

	.responsive-table tr {
		display: table-row;
	}

	.responsive-table th, .responsive-table td {
		display: table-cell;
		padding: .5em;
	}

	.responsive-table caption {
		font-size: 1.5em;
	}

	.responsive-table tbody {
		display: table-row-group;
	}

	.responsive-table tbody tr {
		display: table-row;
		border-width: 1px;
	}

	.responsive-table tbody tr:nth-of-type(even) {
		background-color: rgba(238,238,238, 0.4);
	}

	.responsive-table tbody th[scope="row"] {
		background-color: transparent;
		color: #5e5d52;
		text-align: left;
	}

	.responsive-table a {
		color: black;
	}

	.responsive-table tbody td {
		text-align: center;
	}

	.responsive-table tbody td[data-title]:before {
		content: none;
	}
}

@media (min-width: 62em) {
	.responsive-table {
		font-size: 1em;
	}

	.responsive-table th, .responsive-table td {
		padding: .75em .5em;
	}

	.responsive-table tfoot {
		font-size: .9em;
	}
}

@media (min-width: 75em) {
	.responsive-table th, .responsive-table td {
		padding: .75em;
	}
}
</style>
<style>
.tooltip{display:inline-block}.tooltip-point{display:inline-block;cursor:pointer;background:transparent;color:var(--rgba-color);position:relative;left:4px}.tooltip-content{display:inline-block;font-style:italic;margin-left:1em;opacity:0;transform:scale(0)}@keyframes in{from{opacity:0;transform:scale(0)}to{opacity:1;transform:scale(1)}}.tooltip:hover .tooltip-content{animation:in 1s ease-in forwards}.form input[type="text"]:focus{outline-style:none}.form input[type="text"]:focus + .tooltip .tooltip-content{animation:in 1s ease-in forwards}
</style>