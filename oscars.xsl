<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<!--set parameters-->
    <xsl:param name="selections"/>
    <xsl:param name="yearInput"/>
    <xsl:param name="queryYear"/>
	<xsl:param name="categoryInput"/>
    <xsl:param name="queryCategory"/>
	<xsl:param name="nomineeInput"/>
	<xsl:param name="queryNominee"/>
	<xsl:param name="infoInput"/>
    <xsl:param name="queryInfo"/>
	
	
	
	
	
	
	
<xsl:template match="/">
  <html>
  <body>
  <!--Heading-->
    <h2>Nominations for the academy awards</h2>
	<!--table border and colour-->
    <table border="1">
      <tr bgcolor="Yellow">
	  <!--headers for table-->
        <th>Year</th>
        <th>Category</th>
		<th>Nominee</th>
        <th>Info</th>
		<th>Won</th>
		
		
      </tr>
	  <!--loop through each-->
      <xsl:for-each select="Oscars/Nomination">
	  
	  <!--if statement test-->
 
        <xsl:if test="$selections='all' or ($selections='win' and Won='yes') or ($selections = 'lose' and Won='no')">
			<xsl:if test="($queryYear = 'none' and $queryCategory = 'none' and $queryNominee = 'none' and $queryInfo = 'none') or (contains(Year,$yearInput) and contains(Category,$categoryInput) and  contains(Nominee,$nomineeInput) and  contains(Info,$infoInput))" >
		<tr>
	        <!--  select for each value -->
	        <td><xsl:value-of select="Year"/></td>
		    <td><xsl:value-of select="Category"/></td>
			<td><xsl:value-of select="Nominee"/></td>
			<td><xsl:value-of select="Info"/></td>
			<td><xsl:value-of select="Won"/></td>
		   
		</tr>
			
			</xsl:if>
       </xsl:if>
      </xsl:for-each>
    </table>
  </body>
  </html>
</xsl:template>

</xsl:stylesheet>