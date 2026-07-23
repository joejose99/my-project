Imports System.Data.OleDb
Public Class frmEditDepart
    Private Sub dpts()
        Try
            If CheckBox1.Checked = True Then
                txtCourseName.Enabled = False
                'txtCCode.Enabled = False
                txtSec.Enabled = False
                txtSem.Enabled = False
                DateTimePicker1.Enabled = False


                Call conns()
                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Department]"


                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                Dim rows As Integer
                While myAccessReader.Read
                    rows = myAccessReader("RecordCount")
                End While
                myAccessReader.Close()
                'mycon.Close()
                strconss.Close()
                If rows <> 0 Then
                    dtptEdit.Rows.Clear()
                    Call conns()
                    str_sql_user_select = "SELECT *  FROM Department "

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
                        dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vDepartCode")
                        dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vDepartName")
                        dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vMemberId")
                        dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vHeadofDepartName")
                        dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("ddate")

                        'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                        ro += 1

                        'End If
                    End While

                    strconss.Close()
                    ' mycon.Close()

                End If
                If CheckBox1.Checked = False Then
                    dtptEdit.Rows.Clear()
                    Me.CheckBox1.Checked = False
                    txtCCode.Enabled = True
                    txtCourseName.Enabled = True
                    txtCCode.Enabled = True
                    txtSec.Enabled = True
                    txtSem.Enabled = True
                    DateTimePicker1.Enabled = True


                    butEdit.Visible = False
                    butDelete.Visible = False
                    'mycon.Close()
                    strconss.Close()
                End If
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub CheckBox1_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CheckBox1.CheckedChanged
        Call dpts()
        txtCCode.Text = ""

    End Sub

   

    Private Sub txtCCode_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles txtCCode.DoubleClick
        
    End Sub

    Private Sub txtCCode_KeyUp(ByVal sender As Object, ByVal e As System.Windows.Forms.KeyEventArgs) Handles txtCCode.KeyUp
        Try
            CheckBox1.Checked = False
            Call conns()
            Dim ro As Integer
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Department]  "
            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer
            Dim rowme As String = ""
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()



            'While myreader.Read
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
                rowme = myAccessReader("RecordCount")
            End While
            'myreader.Close()
            'mycon.Close()

            myAccessReader.Close()
            strconss.Close()



            If rows <> 0 Then
                dtptEdit.Rows.Clear()
                Call conns()
                'str_sql_user_select = "SELECT *  FROM Department "
                str_sql_user_select = "SELECT * FROM Department where vDepartName  like '" & txtCCode.Text & "%'  "

                ' comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                ' myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                ' dt.Columns.Add("description", GetType(String))
                dtptEdit.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                'Dim ro As Integer = 0
                While myAccessReader.Read()

                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vDepartCode")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vDepartName")
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vMemberId")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vHeadofDepartName")
                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("ddate")

                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    ro += 1

                    'End If
                End While

                strconss.Close()
                ' mycon.Close()




                'Call conns()
                'ComboBox1.Enabled = False


            End If


            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub txtCCode_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles txtCCode.TextChanged

    End Sub


    Public Sub showbut()
        butEdit.Show()
        butDelete.Show()
        txtCCode.Enabled = False
    End Sub
    Public Sub hidbut()
        butEdit.Visible = False
        butDelete.Visible = False
        txtCCode.Enabled = True
    End Sub

    Private Sub txtCourseName_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles txtCourseName.DoubleClick
        showbut()
    End Sub

    Private Sub txtSec_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles txtSec.DoubleClick
        showbut()
    End Sub

    Private Sub txtSem_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles txtSem.DoubleClick
        showbut()
    End Sub



    Private Sub butReset_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butReset.Click
        hidbut()
        txtCCode.Text = ""
        txtSem.Text = ""
        txtSec.Text = ""
        dtptEdit.Rows.Clear()
        CheckBox1.Checked = False
        txtCourseName.Text = ""

    End Sub

    Private Sub butEdit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butEdit.Click
        Try


            Dim NoDpt As Integer = 0

            If _stid <> "" Then


                Call conns()

                str_sql_user_select = "SELECT * FROM Church where vMemberId ='" & _stid & "'  "


                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                While myAccessReader.Read()

                    NoDpt = CInt(myAccessReader("vNoOfDpt"))

                End While
                'mycon.Close()
                myAccessReader.Close()
                strconss.Close()


            End If
            Dim sqlStrings As String = ""

            Dim dateapp As String
            dateapp = CStr(DateTimePicker1.Value)


            'Dim ros As Integer


            Call conns()



            Dim ro As Integer
            Dim sqlString As String = ""

            ' Me.dtCourse.Rows.Clear()
            'reading from the datareader
            Dim code As String
            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Department]"

            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            Dim rows As Integer
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            code = dtptEdit.Rows(ro).Cells(0).Value
            While rows > ro
                For i As Integer = 0 To dtptEdit.RowCount - 1

                    If code = codes Then


                        sqlString = "UPDATE  [Department] SET " & _
                       "[vDepartName] = '" & dtptEdit.Rows(ro).Cells(1).Value & "'," & _
                        "[vMemberId] = '" & dtptEdit.Rows(ro).Cells(2).Value & "' ," & _
                        "[vHeadofDepartName] = '" & dtptEdit.Rows(ro).Cells(3).Value & " '," & _
                       "[dDate] = '" & dtptEdit.Rows(ro).Cells(4).Value & "'" & _
                         "where vDepartCode ='" & codes & "'"

                        'comUserSelect = New SqlCommand(sqlString, mycon)
                        'comUserSelect.ExecuteNonQuery()
                        comUserSelectS = New OleDbCommand(sqlString, strconss)
                        myAccessReader = comUserSelectS.ExecuteReader()

                    End If

                Next i

                ro += 1
                code = dtptEdit.Rows(ro).Cells(0).Value

            End While
            MsgBox("Data has been Edited", MsgBoxStyle.Information, "Edit")
            'CheckBox1.Checked = False
            If _stid <> "" Then
                Call conns()

                'Dim sqlString As String
                'Dim NoDpt As Integer = 0
                NoDpt += 1
                sqlString = "UPDATE  [Church] SET " & _
                        "vNoOfDpt='" & NoDpt & "'" & _
                        "where vMemberId ='" & _stid & "' "

                'comUserSelect = New SqlCommand(sqlString, mycon)
                'comUserSelect.ExecuteNonQuery()

                comUserSelectS = New OleDbCommand(sqlString, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                strconss.Close()
            End If
            ' mycon.Close()
            strconss.Close()
            Call requery()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try


    End Sub
    Private codes As String

    Private Sub dtptEdit_CellClick(ByVal sender As Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtptEdit.CellClick
        codes = ""
        codes = dtptEdit.CurrentRow.Cells(0).Value()
    End Sub
    Private cel1, cel2 As String
    Private Sub dtptEdit_CellContentClick(ByVal sender As System.Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtptEdit.CellContentClick
        codes = ""
        codes = dtptEdit.CurrentRow.Cells(0).Value()
        
    End Sub
    Private Sub requery()
        Try

            'If CheckBox1.Checked = True Then
            txtCourseName.Enabled = False
            ' txtCCode.Enabled = False
            txtSec.Enabled = False
            txtSem.Enabled = False
            DateTimePicker1.Enabled = False


            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Department]"
            ' comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            ' myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            Dim rows As Integer
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()

            dtptEdit.Rows.Clear()
            Call conns()
            If rows <> 0 Then
                str_sql_user_select = "SELECT *  FROM Department"

                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ' dt.Columns.Add("description", GetType(String))
                dtptEdit.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                Dim ro As Integer = 0
                While myAccessReader.Read()

                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vDepartCode")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vDepartName")
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vMemberId")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vHeadofDepartName")
                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("ddate")
                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    ro += 1

                    'End If
                End While


                'mycon.Close()
                strconss.Close()
                'End If
              
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub frmEditDepart_Activated(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Activated

        Me.Left = 0
        Me.Top = 100
        Me.Width = 677
        Me.Height = 530
        Me.MdiParent = mdiChurch

    End Sub

    Private Sub frmEditDepart_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Click
        Me.BringToFront()
    End Sub

    Private Sub frmEditDepart_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load

        Me.Left = 0
        Me.Top = 100
        Me.Width = 677
        Me.Height = 530
        Me.MdiParent = mdiChurch

        Call requery()
        butEdit.Visible = False
        butDelete.Visible = False
        txtCCode.Text = ""
        Me.txtCourseName.Text = ""
        Me.txtSec.Text = ""
        Me.txtSem.Text = ""
    End Sub

    Private Sub dtptEdit_CellDoubleClick(ByVal sender As Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtptEdit.CellDoubleClick
        butEdit.Visible = True
        butDelete.Visible = True
        codes = ""
        codes = dtptEdit.CurrentRow.Cells(0).Value()

    End Sub
    Private _stid As String
    Private mids As String

    Public Property MId() As String
        Get
            Return _stid
        End Get
        Set(ByVal value As String)
            _stid = value
            mids = _stid



           

            Try
                Dim sqlString As String = ""
                Dim surname As String = ""
                Dim fname As String = ""
                Dim mbId As String = ""
                Call conns()

                str_sql_user_select = "SELECT * FROM  Church where vMemberId= '" & mids & "'"

                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                Dim ro As Integer = 0
                While myAccessReader.Read()


                    mbId = myAccessReader("vMemberId")
                    'dtptEdit.CurrentRow.Cells(3).Value = myAccessReader("vFname")
                    surname = myAccessReader("vSurname")
                    fname = myAccessReader("vFname")

                    ' Me.TextBox10.Text = myAccessReader("vMidName")




                    ro += 1

                End While
                If codes <> "" Then
                    dtptEdit.CurrentRow.Cells(2).Value = mbId
                    dtptEdit.CurrentRow.Cells(3).Value = surname & "  " & fname
                End If
                myAccessReader.Close()
                strconss.Close()
                Exit Property
            Catch Exp As OleDb.OleDbException
                MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
            Catch Exp As Exception
                MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
            End Try
        End Set

    End Property
    Private Sub butDelete_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butDelete.Click
        Try
            Dim Choice As String
            If txtCCode.Text <> "" And CheckBox1.Checked = False And txtCCode.Enabled = False Then
                Choice = MsgBox("Are you sure you want to Delete?", vbYesNo + vbInformation, "Delete")
                If Choice = vbYes Then
                    Call conns()
                    str_sql_user_select = "Delete from [Department] where vDepartCode='" & txtCCode.Text & "'"

                    ' comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                    'myreader = comUserSelect.ExecuteReader()

                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    MsgBox("Data has been Deleted", MsgBoxStyle.Information, "Delete")
                    dtptEdit.Rows.Clear()
                    txtCCode.Text = ""
                    txtCourseName.Text = ""
                    txtSec.Text = ""
                    txtSem.Text = ""
                    myAccessReader.Close()



                    Exit Sub
                End If
            End If
            If CheckBox1.Checked = True And codes <> "" Then
                Dim Choices As String = ""

                Choices = MsgBox("Are you sure you want to Delete?", vbYesNo + vbInformation, "Delete")
                If Choices = vbYes Then
                    Call conns()
                    str_sql_user_select = "Delete  from [Department] where vDepartCode='" & codes & "'"

                    ' comUserSelect = New SqlCommand(str_sql_user_select, mycon)
                    'myreader = comUserSelect.ExecuteReader()
                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()


                    MsgBox("Data has been Deleted", MsgBoxStyle.DefaultButton1, "Delete")


                    myAccessReader.Close()



                End If
            End If
            strconss.Close()
            Call requery()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub butExit_Click_1(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butExit.Click
        Me.Close()
    End Sub

    Private Sub dtptEdit_CellMouseDoubleClick(ByVal sender As Object, ByVal e As System.Windows.Forms.DataGridViewCellMouseEventArgs) Handles dtptEdit.CellMouseDoubleClick
        'cel1 = dtptEdit.ProductName
        cel2 = dtptEdit.CurrentCell.ColumnIndex

        _stid = ""
        If cel2 = "2" Then
            frmMemberPuup.MdiParent = mdiChurch
            frmMemberPuup.Show()
            frmMemberPuup.BringToFront()
            frmMemberPuup.WindowState = FormWindowState.Normal
        End If
        If cel2 = "3" Then
            frmMemberPuup.MdiParent = mdiChurch
            frmMemberPuup.Show()
            frmMemberPuup.BringToFront()
            frmMemberPuup.WindowState = FormWindowState.Normal
        End If
    End Sub

    Private printNo As Integer
    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        printNo = 0


        PrintPreviewDialog1.Width = 1500
        PrintPreviewDialog1.Height = 1200
        PrintPreviewDialog1.AutoSizeMode = False
        PrintPreviewDialog1.PrintPreviewControl.AutoZoom = True


        lst()
        PrintBIll()
        If PrintPreviewDialog1.Created = False Then
            code = ""
        End If
        intJoe = 0
    End Sub
    Private numb As Integer
    Private X1 As Integer
    Private X2 As Integer
    Private W2 As Integer
    Private W1 As Integer
    Private W3 As Integer
    Private X3 As Integer

    Public Sub PrintBIll()
        ' Dim Y As Integer


        Dim PSize As Integer = ListItems.Items.Count
        'Dim PSize As Integer = numb
        Dim PHi As Double

        With PrintDocument1.DefaultPageSettings
            Dim Ps As Printing.PaperSize
            PHi = PSize * 20 + 350
            Ps = New Printing.PaperSize("Student Details", 800, 1000)
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

    Private Yc As Integer
    Private ctr_pay As Integer
    Private counts_pay As Integer
    Private count_pay As Integer
    Private numbs_pay As Integer
    Private array_STId(array_STId1) As String
    Private nos As Integer
    Private array_STId1 As Integer

    Private Sub PrintDocument1_PrintPage(ByVal sender As System.Object, ByVal e As System.Drawing.Printing.PrintPageEventArgs) Handles PrintDocument1.PrintPage
        Try
            Dim ro As Integer = 0
            Dim lines, Cols As Integer
            str = ""
            Yc = 0
            lines = 0
            Cols = 0

            ListItems.Text = numb
            Y = PrintDocument1.DefaultPageSettings.Margins.Top + 1






            Dim rowsOrder As Integer = 0

            Dim studentid As String = ""
            
            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM   Department "
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
            'mycon.Close()
            strconss.Close()


            Dim array_STId2(array_STId1) As String
            Dim array(array_STId1) As String
            Dim stid As String = ""


            If numbs_pay = 0 Then
                Call conns()


                Me.ListItems.Items.Clear()
                str_sql_user_select = "SELECT *   FROM   Department "

                ' str_sql_user_select = "SELECT vSurname,vFname,vMobile FROM Church JOIN Department on Church.vMemberId= Department.vMemberId"

                'str_sql_user_select = "SELECT vSurname,vFname,vMobile,vMemberId from Church where vMemberId =(Select vMemberId,vDepartName  from Department )"
                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                ' myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ro = 0
                While rowsOrder <> ro

                    While myAccessReader.Read()
                        stid = myAccessReader("vMemberId")

                        array_STId2(nos) = stid

                        Me.ListItems.Items.Add(myAccessReader(Trim("vMemberId") & ""))

                        nos += 1
                        ro += 1
                        intJoe = ro
                    End While

                End While

                'mycon.Close()
                strconss.Close()

            End If

           



            e.Graphics.DrawString(School_name, headfont, Brushes.Black, X1 + 120, Y + 40)

            '  e.Graphics.DrawString("SWEDRU SECONDARY SCHOOL", headfont, Brushes.Black, X1 + 120, Y + 40)
            e.Graphics.DrawString("HEAD OF DEPARTMENT DETAILS", headfont, Brushes.Black, X1 + 120, Y + 70)

            'Y = PrintDocument1.DefaultPageSettings.Margins.Top + 10
            With PrintDocument1.DefaultPageSettings
                e.Graphics.DrawLine(Pens.Black, .Margins.Left, Y + 95, _
                .PaperSize.Width - .Margins.Right, Y + 95)
            End With

            '############# COURSE SELECTION

           
            e.Graphics.DrawString("SURNAME: ", tablefont, Brushes.Black, CInt(X1 + 25), CInt(Y) + 110)

            e.Graphics.DrawString("FIRST NAME: ", tablefont, Brushes.Black, CInt(X1 + 115), CInt(Y) + 110)

            e.Graphics.DrawString("PHONE No: ", tablefont, Brushes.Black, CInt(X1 + 210), CInt(Y) + 110)

            e.Graphics.DrawString("DEPARTMENT NAME: ", tablefont, Brushes.Black, CInt(X1 + 300), CInt(Y) + 110)

            'e.Graphics.DrawString("BUS STOP: ", tablefont, Brushes.Black, CInt(X1 + 351), CInt(Y) + 110)

           
            ' e.Graphics.DrawString("ADDRESS: ", tablefont, Brushes.Black, CInt(X1 + 450), CInt(Y) + 110)


            While intJoe > 0

                For Each i As String In Me.ListItems.Items(itm).ToString

                    studentid = Me.ListItems.Items(itm).ToString


                    Call conns()

                    'str_sql_user_select = "SELECT  *  FROM  Church where   vMemberId='" & studentid & "'"

                    str_sql_user_select = "select  DEPARTMENT.vDepartName,vSurname,vFname,vMobile from CHURCH INNER JOIN [DEPARTMENT]  On CHURCH.vMemberId = DEPARTMENT.vMemberId where DEPARTMENT.vMemberId='" & studentid & "' "




                    'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                    'myreader = comUserSelect.ExecuteReader()

                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()



                    While myAccessReader.Read
                        numbs_pay += 1
                        intJoe -= 1
                        e.Graphics.DrawString(numbs_pay & "" & ".", tablefont, Brushes.Black, CInt(X1), CInt(Y) + 130)

                        e.Graphics.DrawString(myAccessReader("vSURNAME"), titlefont, Brushes.Black, CInt(X1 + 30), CInt(Y) + 130)


                        'e.Graphics.DrawString("DEPARTMENT CODE : ", tablefont, Brushes.Black, CInt(X1) + 380, CInt(Y) + 100)
                        'e.Graphics.DrawString(myreader("vDepartCode"), titlefont, Brushes.Black, CInt(X1) + 550, CInt(Y) + 100)


                        e.Graphics.DrawString(myAccessReader("vFName"), titlefont, Brushes.Black, CInt(X1 + 125), CInt(Y) + 130)


                        e.Graphics.DrawString(myAccessReader("vMobile"), titlefont, Brushes.Black, CInt(X1 + 210), CInt(Y) + 130)

                        e.Graphics.DrawString(myAccessReader("vDepartName"), titlefont, Brushes.Black, CInt(X1 + 300), CInt(Y) + 130)





                        'e.Graphics.DrawString(myAccessReader("vBus_Stop"), titlefont, Brushes.Black, CInt(X1 + 351), CInt(Y) + 130)




                        ' e.Graphics.DrawString(myAccessReader("vAddress"), titlefont, Brushes.Black, CInt(X1 + 460), CInt(Y) + 130)


                        Y += PrintDocument1.DefaultPageSettings.Margins.Top + 5

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
                            'counts = 0
                        End If
                        If count_pay = 0 Then
                            e.HasMorePages = False
                        End If



                    End While


                Next
            End While
            If count_pay <> 16 Then
                counts_pay = 0
                count_pay = 0
                numbs_pay = 0
                ctr_pay = 0
                nos = 0
                itm = 0
            End If

          
            'mycon.Close()
            strconss.Close()




        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try






    End Sub

    Private Sub lst()
        Try
            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Church] "

            ' str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Student] where vstudentid='" & TextBox16.Text & "' "
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            ' myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            'Dim numb As Integer
            While myAccessReader.Read
                numb = myAccessReader("RecordCount")
            End While
            'myreader.Close()
            'mycon.Close()
            myAccessReader.Close()
            strconss.Close()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private code As String
   

    
   
    Private Sub butPrint_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butPrint.Click
        printNo = 1
        Dim Choices As String = ""
        Choices = MsgBox("Are you sure you want to  Print?", vbYesNo + vbInformation, "Print")

        If Choices = vbYes Then




            lst()
            PrintBIll()
            code = ""
        End If
        intJoe = 0
    End Sub
End Class