<?xml version="1.0" encoding="UTF-8"?>


<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:param name="editor"/>
	<xsl:param name="title"/>
	<xsl:param name="year"/>
	<xsl:param name="publisher"/>
	<xsl:param name="book"/>
	<xsl:param name="order"/>
	<xsl:param name="order_type"/>
	<xsl:param name="begin"/>
	<xsl:param name="end"/>
    <xsl:output method="html"/>

	
	
    <xsl:template match="/dblp">
		<h2 style="text-align:center;">Les Conférences / Workshops</h2>
			<table width="100%" style="text-align:center;">
				<th>Editeur(s)</th>
				<th>Titre</th>
				<th>Livre</th>
				<th>Série</th>
				<th>Volume</th>
				<th>Année</th>
				<th>Publieur</th>
				<th>ISBN</th>
				<th>Lien</th>
            <xsl:apply-templates select="proceedings[contains(title,$title)][contains(year,$year)][contains(publisher,$publisher)][contains(booktitle,$book)]/editor[contains(.,$editor)]/parent::* | inproceedings[contains(title,$title)][contains(year,$year)][contains(publisher,$publisher)][contains(booktitle,$book)]/editor[contains(.,$editor)]/parent::*">
				<xsl:sort select="*[name()=$order]" data-type="text" order="{$order_type}" />
			</xsl:apply-templates>
			</table>
    </xsl:template>
	

	
	<xsl:template match="proceedings|inproceedings">
		<xsl:if test="position() = ($begin + 1) ">
			<xsl:if test="$begin &gt; 0">
				<form method="GET">
					<input type="hidden" name="pg_BEGIN" >
					<xsl:attribute name="value">
							<xsl:value-of select="($begin - ($end - $begin))"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pg_AUTHOR" >
					<xsl:attribute name="value">
							<xsl:value-of select="$editor"/>
						</xsl:attribute>
					</input>
					
					<input type="hidden" name="pg_TITLE" >
					<xsl:attribute name="value">
							<xsl:value-of select="$title"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pg_YEAR" >
					<xsl:attribute name="value">
							<xsl:value-of select="$year"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pg_PUBLISHER" >
					<xsl:attribute name="value">
							<xsl:value-of select="$publisher"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pg_BOOK" >
					<xsl:attribute name="value">
							<xsl:value-of select="$book"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pg_ORDER_TYPE" >
					<xsl:attribute name="value">
							<xsl:value-of select="$order_type"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pg_ORDER" >
					<xsl:attribute name="value">
							<xsl:value-of select="$order"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pg_SIZE" >
					<xsl:attribute name="value">
							<xsl:value-of select="$end - $begin"/>
						</xsl:attribute>
					</input>
					<input type="submit" value="Précédent"/>
				</form>
			</xsl:if>
			<xsl:if test="last() &gt; $end">
				<form method="GET">
					<input type="hidden" name="pg_AUTHOR" >
					<xsl:attribute name="value">
							<xsl:value-of select="$editor"/>
						</xsl:attribute>
					</input>
					
					<input type="hidden" name="pg_TITLE" >
					<xsl:attribute name="value">
							<xsl:value-of select="$title"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pg_YEAR" >
					<xsl:attribute name="value">
							<xsl:value-of select="$year"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pg_PUBLISHER" >
					<xsl:attribute name="value">
							<xsl:value-of select="$publisher"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pg_BOOK" >
					<xsl:attribute name="value">
							<xsl:value-of select="$book"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pg_ORDER_TYPE" >
					<xsl:attribute name="value">
							<xsl:value-of select="$order_type"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pg_ORDER" >
					<xsl:attribute name="value">
							<xsl:value-of select="$order"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pg_SIZE" >
					<xsl:attribute name="value">
							<xsl:value-of select="$end - $begin"/>
						</xsl:attribute>
					</input>
					<input type="hidden" name="pg_BEGIN" >
					<xsl:attribute name="value">
							<xsl:value-of select="$end"/>
						</xsl:attribute>
					</input>
					<input type="submit" value="Suivant"/>
				</form>				
			</xsl:if>	
		</xsl:if>
	
	

		<xsl:if test="position()&gt; $begin and position()&lt; ($end+1)">
		<tr>
			
			<form method="GET">
				<input type="hidden" name="pg_AUTHOR" >
				<xsl:attribute name="value">
						<xsl:value-of select="$editor"/>
					</xsl:attribute>
				</input>
				
				<input type="hidden" name="pg_TITLE" >
				<xsl:attribute name="value">
						<xsl:value-of select="$title"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pg_YEAR" >
				<xsl:attribute name="value">
						<xsl:value-of select="$year"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pg_PUBLISHER" >
					<xsl:attribute name="value">
						<xsl:value-of select="$publisher"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pg_BOOK" >
					<xsl:attribute name="value">
						<xsl:value-of select="$book"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pg_ORDER_TYPE" >
				<xsl:attribute name="value">
						<xsl:value-of select="$order_type"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pg_ORDER" >
				<xsl:attribute name="value">
						<xsl:value-of select="$order"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pg_SIZE" >
				<xsl:attribute name="value">
						<xsl:value-of select="$end - $begin"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pg_BEGIN" >
				<xsl:attribute name="value">
						<xsl:value-of select="$begin"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="REF" >
					<xsl:attribute name="value">
						<xsl:value-of select="@key"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="MODE"  value="M"/>
				<td style="width:12%;">
					<xsl:for-each select="editor">
						<xsl:if test="position()>1">
							<br/>
						</xsl:if>
						<xsl:value-of select="."/>
					</xsl:for-each>
				</td>
				<td>
					<input style="width:100%;" type="text" name="title">
						<xsl:attribute name="value">
							<xsl:value-of select="title"/>
						</xsl:attribute>
					</input>
				</td>
				<td style="width:15%;">   
					<input style="width:100%;" type="text" name="book">
						<xsl:attribute name="value">
							<xsl:value-of select="booktitle"/>
						</xsl:attribute>
					</input>
				</td>
				<td style="width:15%;">   
					<input style="width:100%;" type="text" name="series">
						<xsl:attribute name="value">
							<xsl:value-of select="series"/>
						</xsl:attribute>
					</input>
				</td>
				<td style="width:3%;">
					<input style="width:100%;" type="text" name="volume">
						<xsl:attribute name="value">
							<xsl:value-of select="volume"/>
						</xsl:attribute>
					</input>
				</td>
				<td style="width:3%;">   
					<xsl:value-of select="year"/>
				</td>
				
				<td style="width:10%;">
					<input style="width:100%;" type="text" name="publisher">
						<xsl:attribute name="value">
							<xsl:value-of select="publisher"/>
						</xsl:attribute>
					</input>
				</td>
				<td style="width:10%;">
					<xsl:for-each select="isbn">
						<xsl:if test="position()>1">
							<br/>
						</xsl:if>
						<xsl:value-of select="."/>
					</xsl:for-each>
				</td>
				
				<td style="width:3%;">
					<xsl:for-each select="ee">
						<xsl:if test="position()>1">
							<br/>
						</xsl:if>
						<a target="_blank">
							<xsl:attribute name="href">
								<xsl:value-of select="."/>
							</xsl:attribute>lien
						</a>
					</xsl:for-each>
				
				</td>
				<td style="width:5%;">
					<input type="submit" value="Modifier"/>
				</td>
			</form>
			<form method="GET">
			<input type="hidden" name="pg_AUTHOR" >
				<xsl:attribute name="value">
						<xsl:value-of select="$editor"/>
					</xsl:attribute>
				</input>
				
				<input type="hidden" name="pg_TITLE" >
				<xsl:attribute name="value">
						<xsl:value-of select="$title"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pg_YEAR" >
				<xsl:attribute name="value">
						<xsl:value-of select="$year"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pg_PUBLISHER" >
					<xsl:attribute name="value">
						<xsl:value-of select="$publisher"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pg_BOOK" >
					<xsl:attribute name="value">
						<xsl:value-of select="$book"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pg_ORDER_TYPE" >
				<xsl:attribute name="value">
						<xsl:value-of select="$order_type"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pg_ORDER" >
				<xsl:attribute name="value">
						<xsl:value-of select="$order"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pg_SIZE" >
				<xsl:attribute name="value">
						<xsl:value-of select="$end - $begin"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="pg_BEGIN" >
				<xsl:attribute name="value">
						<xsl:value-of select="$begin"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="REF" >
					<xsl:attribute name="value">
						<xsl:value-of select="@key"/>
					</xsl:attribute>
				</input>
				<input type="hidden" name="MODE"  value="S"/>
			<td style="width:5%;">
				<input type="submit" value="Supprimer"/>
			
			</td>
			</form>
		</tr>
		
		</xsl:if>
	</xsl:template>
	
	
	

</xsl:stylesheet>
