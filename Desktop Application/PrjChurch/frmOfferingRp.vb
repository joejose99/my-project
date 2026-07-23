Imports System.Data.OleDb
Public Class frmOfferingRp

    Private Sub frmOfferingRp_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Try
            Me.Left = 0
            Me.Top = 100
            Me.Width = 602
            Me.Height = 422
            '602, 422
            Me.MdiParent = mdiChurch
            Dim ro As Integer = 0
            Dim rows As Integer


            Call conns()
            str_sql_user_select = " SELECT COUNT(dpaydate)AS [RecordCount]  FROM Offering"

            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()




            ro = 0
            'Year = DatePart(DateInterval.Year, dates)
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
               
            End While

            myAccessReader.Close()
            strconss.Close()

            If rows <> 0 Then
                Call conns()
                ' str_sql_user_select = " SELECT COUNT(DISTINCT(dateName(mm,dpaydate)))AS [RecordCount]  FROM Offering"

                str_sql_user_select = " SELECT DISTINCT(trim(vYear))AS [RecordCount]  FROM Offering"

                
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()



                'Dim mMonths1 As Date
                Dim dYY As String = ""
                Dim dyear As String = ""
                ro = 0
                ComboBox2.Items.Clear()
                'Year = DatePart(DateInterval.Year, dates)

                While myAccessReader.Read

                    'If TextBox1.Text.Trim <> Trim(myAccessReader("RecordCount")) Then



                    dyear = Trim(myAccessReader("RecordCount"))

                    'TextBox1.Text = DatePart(DateInterval.Year, mMonths1)
                    If dyear <> dYY Then
                        ComboBox1.Items.Add(dyear)
                        dYY = dyear
                    End If
                    ro += 1
                End While

                myAccessReader.Close()
                strconss.Close()





            End If

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private numb As Integer
    Private X1 As Integer
    Private X2 As Integer
    Private W2 As Integer
    Private W1 As Integer
    Private W3 As Integer
    Private X3 As Integer



    Private headfont As New Font("Arial", 14)
    Private tablefont As New Font("Arial", 9)
    Private titlefont As New Font("Times New Roman", 9)
    Private itm As Integer
    Private str As String
    Private Y As Integer
    ' Dim X1 As Integer
    'Dim X2 As Integer
    'Dim W2 As Integer
    ' Private str As String
    Private fntBold As New Font("Arial", 9)
    Private ypos As Integer
    Private xpos As Integer



    Private Yc As Integer



    Public Sub PrintBIll()
        Dim PSize As Integer = ListItems.Items.Count
        'Dim PSize As Integer = numb
        Dim PHi As Double

        With PrintDocument1.DefaultPageSettings
            Dim Ps As Printing.PaperSize
            PHi = PSize * 20 + 350
            Ps = New Printing.PaperSize("Student Outstanding Fees Details", 800, 1000)
            .Margins.Top = 15
            .Margins.Bottom = 20
            .PaperSize = Ps
        End With

        headfont = New Font("Courier New", 16, FontStyle.Bold)
        tablefont = New Font("Times New Roman", 8, FontStyle.Bold)
        titlefont = New Font("Times New Roman", 8)
        X1 = PrintDocument1.DefaultPageSettings.Margins.Left
        'X1 = X1 + 10
        Dim pageWidth As Integer

        With PrintDocument1.DefaultPageSettings
            pageWidth = .PaperSize.Width - .Margins.Left - .Margins.Right
        End With

        X2 = X1 + 120
        X3 = X2 + pageWidth * 0.5
        W1 = X2 - X1
        W2 = X3 - X2
        W3 = pageWidth - X3
        If printNo = 0 Then
            PrintPreviewDialog1.Document = PrintDocument1
            PrintPreviewDialog1.ShowDialog()
        End If
        If printNo = 1 Then
            PrintDocument1.PrintController = New Printing.StandardPrintController
            PrintDocument1.Print()
        End If




    End Sub
    Private ctr_pay As Integer
    Private counts_pay As Integer
    Private count_pay As Integer
    Private numbs_pay As Integer
    Private array_STId(array_STId1) As String
    Private nos As Integer
    Private array_STId1 As Integer
    Private Sub PrintDocument1_PrintPage(ByVal sender As System.Object, ByVal e As System.Drawing.Printing.PrintPageEventArgs) Handles PrintDocument1.PrintPage

        Try
            Dim rowsOrder As Integer = 0
            Dim ro As Integer
            Dim lines, Cols As Integer
            str = ""
            Yc = 0
            lines = 0
            Cols = 0


            Y = PrintDocument1.DefaultPageSettings.Margins.Top + 10




            str = ""
            Yc = 0
            lines = 0
            Cols = 0


            If ComboBox1.Text <> "" And ComboBox2.Text = "" Then

                Call conns()
                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM   Offering where vYear= '" & ComboBox1.Text & "'   "

                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                'Dim rows As Integer
                While myAccessReader.Read
                    rowsOrder = myAccessReader("RecordCount")
                End While
                myAccessReader.Close()
                array_STId1 = rowsOrder
                array_STId1 -= 1
                strconss.Close()

                If rowsOrder = 0 Then
                    MsgBox("Data Not Available ", MsgBoxStyle.Information, "Information")
                    Exit Sub
                End If

                Dim array_STId2(array_STId1) As String
                Dim array(array_STId1) As String
                Dim stid As String = ""


                If numbs_pay = 0 Then
                    Call conns()


                    Me.ListItems.Items.Clear()
                    str_sql_user_select = "SELECT *  FROM Offering  where vYear= '" & ComboBox1.Text & "'   "

                    ' comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                    ' myreader = comUserSelect.ExecuteReader()
                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    ro = 0
                    While rowsOrder <> ro

                        While myAccessReader.Read()
                            stid = myAccessReader("dpaydate")

                            array_STId2(nos) = stid

                            Me.ListItems.Items.Add(myAccessReader(Trim("dpaydate") & ""))

                            nos += 1
                            ro += 1
                        End While

                    End While

                    strconss.Close()

                End If

            End If




            If ComboBox1.Text <> "" And ComboBox2.Text <> "" Then

                Call conns()
                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM   Offering where vYear= '" & ComboBox1.Text & "'   and vMonth ='" & ComboBox2.Text & "' "
                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                'Dim rows As Integer
                While myAccessReader.Read
                    rowsOrder = myAccessReader("RecordCount")
                End While
                myAccessReader.Close()
                array_STId1 = rowsOrder
                array_STId1 -= 1
                strconss.Close()

                If rowsOrder = 0 Then
                    MsgBox("Data Not Available ", MsgBoxStyle.Information, "Information")
                    Exit Sub
                End If

                Dim array_STId2(array_STId1) As String
                Dim array(array_STId1) As String
                Dim stid As String = ""


                If numbs_pay = 0 Then
                    Call conns()


                    Me.ListItems.Items.Clear()
                    str_sql_user_select = "SELECT *  FROM Offering  where vYear= '" & ComboBox1.Text & "'   and vMonth ='" & ComboBox2.Text & "' "

                    ' comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                    ' myreader = comUserSelect.ExecuteReader()
                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    ro = 0
                    While rowsOrder <> ro

                        While myAccessReader.Read()
                            stid = myAccessReader("dpaydate")

                            array_STId2(nos) = stid

                            Me.ListItems.Items.Add(myAccessReader(Trim("dpaydate") & ""))

                            nos += 1
                            ro += 1
                        End While

                    End While

                    strconss.Close()

                End If

            End If



            Dim studentid As String = ""


            Y = PrintDocument1.DefaultPageSettings.Margins.Top + 10
            ' e.Graphics.DrawString("SWEDRU SECONDARY SCHOOL", headfont, Brushes.Black, X1 + 120, Y + 40)

            e.Graphics.DrawString(School_name, headfont, Brushes.Black, X1 + 120, Y + 40)

            With PrintDocument1.DefaultPageSettings
                e.Graphics.DrawLine(Pens.Black, .Margins.Left, Y + 95, _
                .PaperSize.Width - .Margins.Right, Y + 95)
            End With




            If ComboBox1.Text <> "" And ComboBox2.Text = "" Then
                e.Graphics.DrawString("YEARLY OFFERING  DETAILS", headfont, Brushes.Black, X1 + 50, Y + 70)

                'e.Graphics.DrawString("STUDENT  OUTSTANDING  FEES DETAILS", headfont, Brushes.Black, X1 + 100, Y + 50)

                e.Graphics.DrawString("PAYMENT DATE: ", tablefont, Brushes.Black, CInt(X1) + 40, CInt(Y) + 110)

                e.Graphics.DrawString("PAYMENT DESCRIPTION: ", tablefont, Brushes.Black, CInt(X1) + 200, CInt(Y) + 110)

                e.Graphics.DrawString("AMOUNT: ", tablefont, Brushes.Black, CInt(X1) + 400, CInt(Y) + 110)

                For Each i As String In Me.ListItems.Items(itm).ToString

                    studentid = Me.ListItems.Items(itm).ToString

                    Call conns()



                    str_sql_user_select = "SELECT  dpaydate ,vdescrib ,mAmount  FROM Offering where vYear= '" & ComboBox1.Text & "'  "

                    ' comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                    '  myreader = comUserSelect.ExecuteReader()
                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()



                    While myAccessReader.Read
                        numbs_pay += 1
                        e.Graphics.DrawString(numbs_pay & "" & ".", tablefont, Brushes.Black, CInt(X1), CInt(Y) + 130)

                        e.Graphics.DrawString(myAccessReader("dpaydate"), titlefont, Brushes.Black, CInt(X1) + 40, CInt(Y) + 130)



                        e.Graphics.DrawString(myAccessReader("vdescrib"), titlefont, Brushes.Black, CInt(X1) + 200, CInt(Y) + 130)


                        'e.Graphics.DrawString(Format(Val(myreader("mvalues"))), titlefont, Brushes.Black, CInt(X1) + 400, CInt(Y) + 130)
                        e.Graphics.DrawString(myAccessReader("mAmount"), titlefont, Brushes.Black, CInt(X1) + 400, CInt(Y) + 130)




                        Y += PrintDocument1.DefaultPageSettings.Margins.Top + 10

                        ro += 1

                        count_pay += 1
                        ctr_pay += 1
                        itm += 1

                        If itm = rowsOrder Then
                            itm = 0
                            counts_pay = 0
                            count_pay = 0
                            numbs_pay = 0
                            ctr_pay = 0
                            nos = 0
                            e.HasMorePages = False
                            Exit For
                        End If

                        If count_pay >= 16 Then
                            e.HasMorePages = True
                            counts_pay += count_pay

                            count_pay = 0
                            Exit Sub
                        Else
                            e.HasMorePages = False

                        End If
                        If count_pay = 0 Then
                            e.HasMorePages = False
                        End If



                    End While


                Next
                If count_pay <> 16 Then
                    counts_pay = 0
                    count_pay = 0
                    numbs_pay = 0
                    ctr_pay = 0
                    nos = 0
                    itm = 0
                End If


                myAccessReader.Close()
                strconss.Close()

                With PrintDocument1.DefaultPageSettings
                    e.Graphics.DrawLine(Pens.Black, .Margins.Left, Y + 135, _
                    .PaperSize.Width - .Margins.Right, Y + 135)
                End With

                e.Graphics.DrawString("GROUND TOTAL : ", tablefont, Brushes.Black, CInt(X1) + 200, CInt(Y) + 140)
                e.Graphics.DrawString(salsum, titlefont, Brushes.Black, CInt(X1) + 400, CInt(Y) + 140)
                e.Graphics.DrawString("---------------", titlefont, Brushes.Black, CInt(X1) + 400, CInt(Y) + 150)
            End If




            If ComboBox1.Text <> "" And ComboBox2.Text <> "" Then
                e.Graphics.DrawString("MONTHLY OFFERING  DETAILS", headfont, Brushes.Black, X1 + 50, Y + 70)



                'e.Graphics.DrawString("STUDENT  OUTSTANDING  FEES DETAILS", headfont, Brushes.Black, X1 + 100, Y + 50)
                e.Graphics.DrawString("PAYMENT DATE: ", tablefont, Brushes.Black, CInt(X1) + 40, CInt(Y) + 110)

                e.Graphics.DrawString("PAYMENT DESCRIPTION: ", tablefont, Brushes.Black, CInt(X1) + 200, CInt(Y) + 110)

                e.Graphics.DrawString("AMOUNT: ", tablefont, Brushes.Black, CInt(X1) + 400, CInt(Y) + 110)

                For Each i As String In Me.ListItems.Items(itm).ToString

                    studentid = Me.ListItems.Items(itm).ToString

                    Call conns()



                    str_sql_user_select = "SELECT  dpaydate ,vdescrib ,mAmount  FROM Offering where vYear= '" & ComboBox1.Text & "'   and dpaydate = '" & studentid & "'"

                    ' comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)


                    '  myreader = comUserSelect.ExecuteReader()

                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    While myAccessReader.Read

                        numbs_pay += 1
                        e.Graphics.DrawString(numbs_pay & "" & ".", tablefont, Brushes.Black, CInt(X1), CInt(Y) + 130)

                        e.Graphics.DrawString(myAccessReader("dpaydate"), titlefont, Brushes.Black, CInt(X1) + 40, CInt(Y) + 130)

                        ' e.Graphics.DrawString(myreader("dpaydate"), titlefont, Brushes.Black, CInt(X1), CInt(Y) + 130)



                        e.Graphics.DrawString(myAccessReader("vdescrib"), titlefont, Brushes.Black, CInt(X1) + 200, CInt(Y) + 130)


                        e.Graphics.DrawString(myAccessReader("mAmount"), titlefont, Brushes.Black, CInt(X1) + 400, CInt(Y) + 130)




                        Y += PrintDocument1.DefaultPageSettings.Margins.Top + 10

                        ro += 1
                        count_pay += 1
                        ctr_pay += 1
                        itm += 1

                        If itm = rowsOrder Then
                            itm = 0
                            counts_pay = 0
                            count_pay = 0
                            numbs_pay = 0
                            ctr_pay = 0
                            nos = 0
                            e.HasMorePages = False
                            Exit For
                        End If

                        If count_pay >= 11 Then
                            e.HasMorePages = True
                            counts_pay += count_pay

                            count_pay = 0
                            Exit Sub
                        Else
                            e.HasMorePages = False

                        End If
                        If count_pay = 0 Then
                            e.HasMorePages = False
                        End If



                    End While


                Next
                If count_pay <> 11 Then
                    counts_pay = 0
                    count_pay = 0
                    numbs_pay = 0
                    ctr_pay = 0
                    nos = 0
                    itm = 0
                End If



                myAccessReader.Close()
                strconss.Close()

                With PrintDocument1.DefaultPageSettings
                    e.Graphics.DrawLine(Pens.Black, .Margins.Left, Y + 135, _
                    .PaperSize.Width - .Margins.Right, Y + 135)
                End With

                e.Graphics.DrawString("GROUND TOTAL : ", tablefont, Brushes.Black, CInt(X1) + 200, CInt(Y) + 140)
                'e.Graphics.DrawString(Format(Val(salsum1)), titlefont, Brushes.Black, CInt(X1) + 400, CInt(Y) + 140)
                e.Graphics.DrawString(salsum1, titlefont, Brushes.Black, CInt(X1) + 400, CInt(Y) + 140)

                e.Graphics.DrawString("---------------", titlefont, Brushes.Black, CInt(X1) + 400, CInt(Y) + 150)


            End If

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try


    End Sub
    Private salsum As String
    Private salsum1 As String
    Private Sub butPrint_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butPrint.Click
        Try
            printNo = 1
            Dim Choices As String = ""
            Choices = MsgBox("Are you sure you want to  Print?", vbYesNo + vbInformation, "Print")

            If Choices = vbYes Then

                If ComboBox1.Text = "" Then

                    MsgBox("Year Can not be Empty", MsgBoxStyle.Information, "Information")
                    Exit Sub
                End If



                If ComboBox2.Text <> "" Then

                    Call conns()
                    'str_sql_user_select = "SELECT Distinct(datepart(yy,dSalDate)) AS [RecordYear] FROM Salary where vEmpid= '" & Trim(TextBox1.Text) & "" & "'"

                    str_sql_user_select = "SELECT  SUM(mAmount)AS [SALARY]FROM Offering WHERE vMonth='" & ComboBox2.Text & "' "

                    Dim ro As Integer = 0
                    ' comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                    ' myreader = comUserSelect.ExecuteReader()
                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    While myAccessReader.Read()

                        'salsum1 = Format(Val(myAccessReader(Trim("SALARY") & "")))
                        salsum1 = myAccessReader(Trim("SALARY") & "")

                        ro += 1

                    End While
                    strconss.Close()
                    myAccessReader.Close()

                End If
                If ComboBox1.Text <> "" And ComboBox1.Text <> "" Then
                    Call conns()


                    'str_sql_user_select = "SELECT Distinct(datepart(yy,dSalDate)) AS [RecordYear] FROM Salary where vEmpid= '" & Trim(TextBox1.Text) & "" & "'"

                    str_sql_user_select = "SELECT  SUM(mAmount)AS [SALARY]FROM Offering WHERE vYear='" & ComboBox1.Text & "'"


                    ' comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                    ' myreader = comUserSelect.ExecuteReader()
                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    Dim ro As Integer = 0
                    While myAccessReader.Read()

                        salsum = myAccessReader("SALARY")

                        ro += 1

                    End While
                    strconss.Close()
                    myAccessReader.Close()
                End If


                PrintBIll()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub PrintPreviewDialog1_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles PrintPreviewDialog1.Load

    End Sub

    Private Sub butExit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butExit.Click
        Me.Close()
    End Sub

    

    Private Sub Panel1_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles Panel1.Click
        Me.BringToFront()
    End Sub

    Private Sub Panel1_Paint(ByVal sender As System.Object, ByVal e As System.Windows.Forms.PaintEventArgs) Handles Panel1.Paint

    End Sub
    Private printNo As Integer
    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click

        Try
            printNo = 0
            If ComboBox1.Text = "" Then

                MsgBox("Year Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If



            If ComboBox2.Text <> "" And ComboBox1.Text <> "" Then

                Call conns()
                'str_sql_user_select = "SELECT Distinct(datepart(yy,dSalDate)) AS [RecordYear] FROM Salary where vEmpid= '" & Trim(TextBox1.Text) & "" & "'"

                str_sql_user_select = "SELECT  SUM(mAmount)AS [SALARY]FROM Offering WHERE vMonth='" & ComboBox2.Text & "' and  vYear='" & ComboBox1.Text & "'"

                Dim ro As Integer = 0
                ' comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                ' myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                While myAccessReader.Read()

                    salsum1 = myAccessReader(Trim("SALARY") & "")

                    ro += 1

                End While
                strconss.Close()
                myAccessReader.Close()

            End If
            If ComboBox1.Text <> "" And ComboBox2.Text = "" Then
                Call conns()


                'str_sql_user_select = "SELECT Distinct(datepart(yy,dSalDate)) AS [RecordYear] FROM Salary where vEmpid= '" & Trim(TextBox1.Text) & "" & "'"

                str_sql_user_select = "SELECT  SUM(mAmount)AS [SALARY]FROM Offering WHERE vYear='" & ComboBox1.Text & "'"


                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                Dim ro As Integer = 0
                While myAccessReader.Read()

                    salsum = myAccessReader("SALARY")

                    ro += 1

                End While
                strconss.Close()
                myAccessReader.Close()
            End If
            PrintPreviewDialog1.Width = 1500
            PrintPreviewDialog1.Height = 1200
            PrintPreviewDialog1.AutoSizeMode = False
            PrintPreviewDialog1.PrintPreviewControl.AutoZoom = True


            PrintBIll()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub ComboBox1_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ComboBox1.SelectedIndexChanged
        Try


            ComboBox2.Text = ""

            Call conns()
            str_sql_user_select = " SELECT count(dpaydate)AS [RecordCount]  FROM Offering where vYear= '" & ComboBox1.Text & "' "

            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            Dim rows As Integer

            While myAccessReader.Read
                rows = myAccessReader("RecordCount")

            End While
            myAccessReader.Close()
            strconss.Close()
            If rows <> 0 Then
                dtptEdit.Rows.Clear()
                Call conns()
                ' str_sql_user_select = "SELECT *  FROM Offering where dpaydate='" & dateapp & "'"
                str_sql_user_select = "SELECT *  FROM Offering where vYear= '" & ComboBox1.Text & "'   "

                ' comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                ' myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ' dt.Columns.Add("description", GetType(String))
                dtptEdit.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                Dim ro As Integer = 0
                While myAccessReader.Read()

                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("id")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vdescrib")
                    dtptEdit.Rows(ro).Cells(2).Value = (myAccessReader("mAmount"))
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vName")


                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("dpaydate")

                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    ro += 1

                    'End If
                End While


                strconss.Close()

                myAccessReader.Close()







                Call conns()
                ' str_sql_user_select = " SELECT COUNT(DISTINCT(dateName(mm,dpaydate)))AS [RecordCount]  FROM Offering"

                str_sql_user_select = " SELECT DISTINCT(trim(vMonth))AS [RecordCount]  FROM Offering where vYear ='" & ComboBox1.Text & " '"


                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()



                'Dim mMonths1 As Date
                Dim dYY As String = ""
                Dim dyear As String = ""
                ro = 0
                ComboBox2.Text = ""
                ComboBox2.Items.Clear()
                'Year = DatePart(DateInterval.Year, dates)

                While myAccessReader.Read

                    'If TextBox1.Text.Trim <> Trim(myAccessReader("RecordCount")) Then



                    dyear = Trim(myAccessReader("RecordCount"))

                    'TextBox1.Text = DatePart(DateInterval.Year, mMonths1)
                    If dyear <> dYY Then
                        ComboBox2.Items.Add(dyear)
                        dYY = dyear
                    End If
                    ro += 1
                End While

                myAccessReader.Close()
                strconss.Close()



            End If
            If rows = 0 Then
                dtptEdit.Rows.Clear()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub ComboBox2_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ComboBox2.SelectedIndexChanged
        Try




            Call conns()
            str_sql_user_select = " SELECT Count(dpaydate)AS [RecordCount]  FROM Offering where vYear= '" & ComboBox1.Text & "' and vMonth ='" & ComboBox2.Text & "'"

            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            Dim rows As Integer

            While myAccessReader.Read
                rows = myAccessReader("RecordCount")

            End While
            myAccessReader.Close()
            strconss.Close()


            If rows <> 0 Then
                dtptEdit.Rows.Clear()
                Call conns()
                ' str_sql_user_select = "SELECT *  FROM Offering where dpaydate='" & dateapp & "'"
                str_sql_user_select = "SELECT *  FROM Offering where vYear= '" & ComboBox1.Text & "' and vMonth ='" & ComboBox2.Text & "' "

                ' comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                ' myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ' dt.Columns.Add("description", GetType(String))
                dtptEdit.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                Dim ro As Integer = 0
                While myAccessReader.Read()

                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("id")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vdescrib")
                    dtptEdit.Rows(ro).Cells(2).Value = (myAccessReader("mAmount"))
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vName")

                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("dpaydate")

                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    ro += 1

                    'End If
                End While


                strconss.Close()

                myAccessReader.Close()

            End If
            If rows = 0 Then
                dtptEdit.Rows.Clear()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub Button2_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button2.Click
        ComboBox1.Text = ""
        ComboBox2.Text = ""
        ComboBox2.Items.Clear()
        dtptEdit.Rows.Clear()
    End Sub

    Private Sub Button3_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button3.Click
        Try
            Dim ro As Integer = 0
            Dim rows As Integer


            Call conns()
            ComboBox1.Items.Clear()
            ComboBox2.Text = ""
            str_sql_user_select = " SELECT COUNT(dpaydate)AS [RecordCount]  FROM Offering"

            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()




            ro = 0
            'Year = DatePart(DateInterval.Year, dates)
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")

            End While

            myAccessReader.Close()
            strconss.Close()

            If rows <> 0 Then
                Call conns()
                ' str_sql_user_select = " SELECT COUNT(DISTINCT(dateName(mm,dpaydate)))AS [RecordCount]  FROM Offering"

                str_sql_user_select = " SELECT DISTINCT(trim(vYear))AS [RecordCount]  FROM Offering"


                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()



                'Dim mMonths1 As Date
                Dim dYY As String = ""
                Dim dyear As String = ""
                ro = 0
                ComboBox2.Items.Clear()
                'Year = DatePart(DateInterval.Year, dates)

                While myAccessReader.Read

                    'If TextBox1.Text.Trim <> Trim(myAccessReader("RecordCount")) Then



                    dyear = Trim(myAccessReader("RecordCount"))

                    'TextBox1.Text = DatePart(DateInterval.Year, mMonths1)
                    If dyear <> dYY Then
                        ComboBox1.Items.Add(dyear)
                        dYY = dyear
                    End If
                    ro += 1
                End While

                myAccessReader.Close()
                strconss.Close()





            End If

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
End Class